<?php

use Illuminate\Support\Str;

if (!function_exists('sanitize_filename')) {
    /**
     * Membersihkan nama file dari karakter berbahaya, spasi, atau path traversal (LFI/RFI).
     *
     * @param string|null $filename
     * @return string
     */
    function sanitize_filename(?string $filename): string
    {
        if (empty($filename)) {
            return '';
        }

        // Ambil hanya nama file dasar (menghilangkan ../ atau ..\ atau path absolut)
        $filename = basename(str_replace(['\\', '/', "\0"], '/', $filename));

        // Pisahkan nama dan ekstensi
        $info = pathinfo($filename);
        $name = $info['filename'] ?? 'file';
        $ext  = strtolower($info['extension'] ?? '');

        // Bersihkan nama hanya alfabet, angka, tanda minus dan underscore
        $cleanName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $name);
        $cleanName = trim(preg_replace('/_+/', '_', $cleanName), '_');

        if (empty($cleanName)) {
            $cleanName = 'doc_' . time();
        }

        return !empty($ext) ? $cleanName . '.' . $ext : $cleanName;
    }
}

if (!function_exists('upload_asset')) {
    /**
     * Menghasilkan URL aset publik yang aman ke direktori uploads/
     * Menghilangkan path traversal, prefix storage ganda, dan karakter berbahaya untuk WAF.
     *
     * @param string|null $path Path atau nama file yang disimpan di DB
     * @param string $defaultFolder Subfolder default (misal: 'kepala-daerah', 'lhkpn', 'sekda', 'berita')
     * @return string URL aset yang sudah tersanitasi
     */
    function upload_asset(?string $path, string $defaultFolder = ''): string
    {
        if (empty($path)) {
            return '';
        }

        // Jika sudah berupa URL eksternal (http/https), kembalikan langsung
        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        // Normalisasi separator dan hapus null byte / query string / fragment
        $clean = str_replace(['\\', "\0"], ['/', ''], $path);
        $clean = preg_replace('#\?.*$#', '', $clean);
        $clean = preg_replace('#\#.*$#', '', $clean);

        // Hapus indikasi path traversal LFI/RFI
        $clean = preg_replace('#\.\.+/#', '', $clean);
        $clean = preg_replace('#/+#', '/', $clean);
        $clean = trim($clean, '/');

        // Hilangkan prefix redundant seperti 'storage/', 'public/', 'uploads/'
        $clean = preg_replace('#^(storage|public|uploads)/#i', '', $clean);
        $clean = preg_replace('#^(storage|public|uploads)/#i', '', $clean);

        $filenameOnly = basename($clean);

        // Jika subfolder default ditentukan
        if ($defaultFolder !== '') {
            $cleanFolder = trim(str_replace(['\\', '/'], '', $defaultFolder));
            $folderLower = strtolower($cleanFolder);
            $cleanLower  = strtolower($clean);

            // Cek apakah sudah diawali nama folder tersebut
            if (!str_starts_with($cleanLower, $folderLower . '/')) {
                // Cek alias folder seperti artikel vs artikel-images
                $isAliased = false;
                if ($folderLower === 'artikel' && str_starts_with($cleanLower, 'artikel-images/')) {
                    $isAliased = true;
                }
                if (!$isAliased) {
                    $clean = $cleanFolder . '/' . $filenameOnly;
                }
            }
        }

        // 1. Cek jika file fisik ada di public/uploads/...
        if (function_exists('public_path') && file_exists(public_path('uploads/' . $clean)) && is_file(public_path('uploads/' . $clean))) {
            return asset('uploads/' . $clean);
        }

        // 2. Cek jika file fisik ada di public/storage/... (hasil upload controller lama)
        if (function_exists('public_path') && file_exists(public_path('storage/' . $clean)) && is_file(public_path('storage/' . $clean))) {
            return asset('storage/' . $clean);
        }

        // 3. Cek di storage_path('app/public/' . ...) jika symlink storage belum ada
        if (function_exists('storage_path') && file_exists(storage_path('app/public/' . $clean)) && is_file(storage_path('app/public/' . $clean))) {
            return asset('storage/' . $clean);
        }

        // 4. Cek jika hanya ada di folder uploads/{folder}/{filenameOnly}
        if ($defaultFolder !== '' && function_exists('public_path') && file_exists(public_path('uploads/' . $defaultFolder . '/' . $filenameOnly)) && is_file(public_path('uploads/' . $defaultFolder . '/' . $filenameOnly))) {
            return asset('uploads/' . $defaultFolder . '/' . $filenameOnly);
        }

        // 5. Cek jika hanya ada di folder storage/{folder}/{filenameOnly}
        if ($defaultFolder !== '' && function_exists('public_path') && file_exists(public_path('storage/' . $defaultFolder . '/' . $filenameOnly)) && is_file(public_path('storage/' . $defaultFolder . '/' . $filenameOnly))) {
            return asset('storage/' . $defaultFolder . '/' . $filenameOnly);
        }

        return asset('uploads/' . $clean);
    }
}
