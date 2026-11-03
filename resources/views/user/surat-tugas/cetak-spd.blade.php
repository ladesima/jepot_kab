<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perjalanan Dinas (SPD) - {{ $suratTugas->nomor_spd ?? $suratTugas->nomor_st }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Times+New+Roman&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4 portrait;
            margin: 15mm 20mm 15mm 20mm;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            line-height: 1.35;
            color: #000;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        .paper {
            background: #fff;
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            padding: 15mm 20mm;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            box-sizing: border-box;
            position: relative;
        }
        .kop-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2px;
        }
        .kop-table td {
            vertical-align: middle;
        }
        .kop-logo {
            width: 80px;
            text-align: center;
        }
        .kop-logo img {
            width: 75px;
            height: auto;
        }
        .kop-text {
            text-align: center;
        }
        .kop-text h3 {
            margin: 0;
            font-size: 13pt;
            font-weight: normal;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .kop-text h2 {
            margin: 0;
            font-size: 15pt;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }
        .kop-text p {
            margin: 2px 0 0 0;
            font-size: 9.5pt;
            line-height: 1.3;
        }
        .garis-kop {
            border: none;
            border-top: 3px solid #000;
            border-bottom: 1px solid #000;
            height: 4px;
            margin: 4px 0 12px 0;
        }
        .meta-right {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
            font-size: 10pt;
        }
        .meta-table {
            border-collapse: collapse;
        }
        .meta-table td {
            padding: 1px 4px;
        }
        .judul-spd {
            text-align: center;
            margin-bottom: 14px;
        }
        .judul-spd h4 {
            margin: 0;
            font-size: 13pt;
            font-weight: bold;
            text-decoration: underline;
            letter-spacing: 1px;
        }
        .judul-spd p {
            margin: 2px 0 0 0;
            font-size: 10.5pt;
        }
        .table-spd {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .table-spd th, .table-spd td {
            border: 1px solid #000;
            padding: 4px 6px;
            vertical-align: top;
            font-size: 10.5pt;
        }
        .col-num {
            width: 25px;
            text-align: center;
        }
        .col-item {
            width: 230px;
        }
        .ttd-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .ttd-box {
            width: 50%;
            text-align: left;
            padding-left: 20px;
        }
        .no-print-bar {
            max-width: 210mm;
            margin: 0 auto 15px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #1e293b;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-family: sans-serif;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s;
        }
        .btn-primary { background: #0284c7; color: white; }
        .btn-primary:hover { background: #0369a1; }
        .btn-success { background: #10b981; color: white; }
        .btn-success:hover { background: #059669; }
        .btn-dark { background: #475569; color: white; }
        .btn-dark:hover { background: #334155; }

        @media print {
            body {
                background: #fff;
                padding: 0;
            }
            .no-print-bar {
                display: none !important;
            }
            .paper {
                box-shadow: none;
                margin: 0;
                padding: 0;
                width: 100%;
                min-height: auto;
            }
        }
    </style>
</head>
<body>

    <div class="no-print-bar">
        <div style="font-family: sans-serif; font-size: 14px; font-weight: bold;">
            Preview Surat Perjalanan Dinas (SPD): {{ $suratTugas->nomor_spd ?? $suratTugas->nomor_st }}
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('user.surat-tugas') }}" class="btn btn-dark">
                &larr; Kembali
            </a>
            <a href="{{ route('user.surat-tugas.export-doc', ['id' => $suratTugas->id, 'type' => 'spd']) }}" class="btn btn-success">
                Download Word (.doc)
            </a>
            <button onclick="window.print()" class="btn btn-primary">
                Cetak / Simpan PDF
            </button>
        </div>
    </div>

    <div class="paper">
        <!-- KOP SURAT PEMKAB JENEPONTO -->
        <table class="kop-table">
            <tr>
                <td class="kop-logo">
                    <img src="{{ asset('images/new_logo.png') }}" alt="Logo Jeneponto">
                </td>
                <td class="kop-text">
                    <h3>PEMERINTAH KABUPATEN JENEPONTO</h3>
                    <h2>SEKRETARIAT DAERAH</h2>
                    <p>
                        Jl. Lanto Dg. Pasewang No. 34 Jeneponto, Sulawesi Selatan 92311<br>
                        Telepon: (0419) 21001 &bull; Email: <u>setda@jenepontokab.go.id</u> &bull; Website: <u>www.jenepontokab.go.id</u>
                    </p>
                </td>
            </tr>
        </table>
        <div class="garis-kop"></div>

        <!-- RIGHT SIDE META -->
        <table style="width: 100%; margin-bottom: 6px;">
            <tr>
                <td style="width: 60%;"></td>
                <td style="width: 40%; font-size: 10pt;">
                    <table class="meta-table">
                        <tr>
                            <td>Lembar Ke</td>
                            <td>:</td>
                            <td>...........</td>
                        </tr>
                        <tr>
                            <td>Kode No</td>
                            <td>:</td>
                            <td>...........</td>
                        </tr>
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td><strong>{{ $suratTugas->nomor_spd ?? $suratTugas->nomor_st }}</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- JUDUL -->
        <div class="judul-spd">
            <h4>SURAT PERJALANAN DINAS (SPD)</h4>
        </div>

        <!-- TABLE SPD 1-9 -->
        <table class="table-spd">
            <tr>
                <td class="col-num">1.</td>
                <td class="col-item">Pejabat Pembuat Komitmen</td>
                <td>{{ $suratTugas->pejabat_jabatan }}</td>
            </tr>
            <tr>
                <td class="col-num">2.</td>
                <td class="col-item">Nama / NIP Pegawai yang diperintahkan</td>
                <td>
                    <strong>{{ $suratTugas->nama_pegawai }}</strong><br>
                    NIP. {{ $suratTugas->nip_pegawai ?? '-' }}
                </td>
            </tr>
            <tr>
                <td class="col-num">3.</td>
                <td class="col-item">
                    a. Pangkat dan Golongan ruang gaji<br>
                    b. Jabatan / Instansi<br>
                    c. Tingkat Biaya Perjalanan Dinas
                </td>
                <td>
                    a. {{ $suratTugas->pangkat_golongan ?? '-' }}<br>
                    b. {{ $suratTugas->jabatan_pegawai }} / Setda Kab. Jeneponto<br>
                    c. Tingkat C
                </td>
            </tr>
            <tr>
                <td class="col-num">4.</td>
                <td class="col-item">Maksud Perjalanan Dinas</td>
                <td>{{ $suratTugas->maksud_tugas }}</td>
            </tr>
            <tr>
                <td class="col-num">5.</td>
                <td class="col-item">Alat angkut yang dipergunakan</td>
                <td>{{ $suratTugas->alat_angkut ?? 'Kendaraan Dinas / Umum' }}</td>
            </tr>
            <tr>
                <td class="col-num">6.</td>
                <td class="col-item">
                    a. Tempat berangkat<br>
                    b. Tempat tujuan
                </td>
                <td>
                    a. Jeneponto<br>
                    b. {{ $suratTugas->tempat_tujuan }}
                </td>
            </tr>
            <tr>
                <td class="col-num">7.</td>
                <td class="col-item">
                    a. Lamanya Perjalanan Dinas<br>
                    b. Tanggal berangkat<br>
                    c. Tanggal harus kembali
                </td>
                <td>
                    a. {{ $suratTugas->durasi_hari }} ({{ $suratTugas->durasi_hari == 1 ? 'satu' : ($suratTugas->durasi_hari == 2 ? 'dua' : ($suratTugas->durasi_hari == 3 ? 'tiga' : ($suratTugas->durasi_hari == 4 ? 'empat' : ($suratTugas->durasi_hari == 5 ? 'lima' : $suratTugas->durasi_hari)))) }}) hari<br>
                    b. {{ \Carbon\Carbon::parse($suratTugas->tanggal_mulai)->translatedFormat('d F Y') }}<br>
                    c. {{ \Carbon\Carbon::parse($suratTugas->tanggal_selesai)->translatedFormat('d F Y') }}
                </td>
            </tr>
            <tr>
                <td class="col-num">8.</td>
                <td class="col-item">Pengikut : Nama</td>
                <td>
                    -
                </td>
            </tr>
            <tr>
                <td class="col-num">9.</td>
                <td class="col-item">
                    Pembebanan Anggaran<br>
                    a. Instansi<br>
                    b. Akun / Mata Anggaran
                </td>
                <td>
                    <br>
                    a. Sekretariat Daerah Kabupaten Jeneponto<br>
                    b. DPA Sekretariat Daerah Kab. Jeneponto T.A. {{ \Carbon\Carbon::parse($suratTugas->tanggal_surat)->year }}
                </td>
            </tr>
            <tr>
                <td class="col-num">10.</td>
                <td class="col-item">Keterangan lain-lain</td>
                <td>Surat Tugas Nomor: {{ $suratTugas->nomor_st }}</td>
            </tr>
        </table>

        <!-- TANDA TANGAN SPD -->
        <table class="ttd-table">
            <tr>
                <td style="width: 50%;"></td>
                <td class="ttd-box">
                    <p style="margin: 0;">Dikeluarkan di : Jeneponto</p>
                    <p style="margin: 0 0 8px 0;">Pada tanggal : {{ \Carbon\Carbon::parse($suratTugas->tanggal_surat)->translatedFormat('d F Y') }}</p>
                    <p style="margin: 0; font-weight: bold;">
                        {{ $suratTugas->pejabat_jabatan }}
                    </p>
                    <div style="height: 60px;"></div>
                    <p style="margin: 0; font-weight: bold; text-decoration: underline;">
                        {{ $suratTugas->pejabat_nama }}
                    </p>
                    @if($suratTugas->pejabat_pangkat)
                    <p style="margin: 0; font-size: 10.5pt;">
                        {{ $suratTugas->pejabat_pangkat }}
                    </p>
                    @endif
                    @if($suratTugas->pejabat_nip)
                    <p style="margin: 0; font-size: 10.5pt;">
                        NIP. {{ $suratTugas->pejabat_nip }}
                    </p>
                    @endif
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
