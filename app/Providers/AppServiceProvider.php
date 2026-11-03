<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Load custom helper functions jika ada file helpers.php
        if (file_exists(app_path('helpers.php'))) {
            require_once app_path('helpers.php');
        }

        // Fallback jika file app/helpers.php belum ter-upload di server hosting
        if (!function_exists('upload_asset')) {
            function upload_asset(?string $path, string $defaultFolder = ''): string
            {
                if (empty($path)) {
                    return '';
                }

                if (preg_match('#^https?://#i', $path)) {
                    return $path;
                }

                $clean = str_replace(['\\', "\0"], ['/', ''], $path);
                $clean = preg_replace('#\?.*$#', '', $clean);
                $clean = preg_replace('#\#.*$#', '', $clean);
                $clean = preg_replace('#\.\.+/#', '', $clean);
                $clean = preg_replace('#/+#', '/', $clean);
                $clean = trim($clean, '/');

                $clean = preg_replace('#^(storage|public|uploads)/#i', '', $clean);
                $clean = preg_replace('#^(storage|public|uploads)/#i', '', $clean);

                $filenameOnly = basename($clean);

                if ($defaultFolder !== '') {
                    $cleanFolder = trim(str_replace(['\\', '/'], '', $defaultFolder));
                    $folderLower = strtolower($cleanFolder);
                    $cleanLower  = strtolower($clean);

                    if (!str_starts_with($cleanLower, $folderLower . '/')) {
                        $isAliased = false;
                        if ($folderLower === 'artikel' && str_starts_with($cleanLower, 'artikel-images/')) {
                            $isAliased = true;
                        }
                        if (!$isAliased) {
                            $clean = $cleanFolder . '/' . $filenameOnly;
                        }
                    }
                }

                if (function_exists('public_path') && file_exists(public_path('uploads/' . $clean)) && is_file(public_path('uploads/' . $clean))) {
                    return asset('uploads/' . $clean);
                }

                if (function_exists('public_path') && file_exists(public_path('storage/' . $clean)) && is_file(public_path('storage/' . $clean))) {
                    return asset('storage/' . $clean);
                }

                if (function_exists('storage_path') && file_exists(storage_path('app/public/' . $clean)) && is_file(storage_path('app/public/' . $clean))) {
                    return asset('storage/' . $clean);
                }

                if ($defaultFolder !== '' && function_exists('public_path') && file_exists(public_path('uploads/' . $defaultFolder . '/' . $filenameOnly)) && is_file(public_path('uploads/' . $defaultFolder . '/' . $filenameOnly))) {
                    return asset('uploads/' . $defaultFolder . '/' . $filenameOnly);
                }

                if ($defaultFolder !== '' && function_exists('public_path') && file_exists(public_path('storage/' . $defaultFolder . '/' . $filenameOnly)) && is_file(public_path('storage/' . $defaultFolder . '/' . $filenameOnly))) {
                    return asset('storage/' . $defaultFolder . '/' . $filenameOnly);
                }

                return asset('uploads/' . $clean);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Enforce strict numeric ID across all routes to prevent WAF SQLi / LFI false alarms
        Route::pattern('id', '[0-9]+');
        Route::pattern('slider', '[0-9]+');
        Route::pattern('pegawai', '[0-9]+');
        Route::pattern('ppid', '[0-9]+');
        Route::pattern('album', '[0-9]+');
        Route::pattern('photo', '[0-9]+');
        Route::pattern('statistic', '[0-9]+');
        Route::pattern('kategori', '[0-9]+');
        Route::pattern('artikel', '[0-9]+');

        if (config('app.env') === 'production' || isset($_SERVER['HTTPS']) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
            URL::forceScheme('https');
        }
    }
}
