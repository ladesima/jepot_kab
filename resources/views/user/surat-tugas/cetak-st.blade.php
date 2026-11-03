<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas - {{ $suratTugas->nomor_st }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Times+New+Roman&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4 portrait;
            margin: 20mm 20mm 20mm 20mm;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.4;
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
            padding: 20mm 25mm;
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
            margin: 4px 0 18px 0;
        }
        .judul-surat {
            text-align: center;
            margin-bottom: 20px;
        }
        .judul-surat h4 {
            margin: 0;
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            letter-spacing: 1px;
        }
        .judul-surat p {
            margin: 2px 0 0 0;
            font-size: 11pt;
        }
        .table-content {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .table-content td {
            padding: 3px 0;
            vertical-align: top;
        }
        .label-col {
            width: 120px;
            font-weight: bold;
        }
        .titik-dua {
            width: 20px;
            text-align: center;
        }
        .text-justify {
            text-align: justify;
        }
        .ttd-container {
            margin-top: 25px;
            width: 100%;
        }
        .ttd-table {
            width: 100%;
            border-collapse: collapse;
        }
        .ttd-box {
            width: 48%;
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
            Preview Surat Tugas: {{ $suratTugas->nomor_st }}
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('user.surat-tugas') }}" class="btn btn-dark">
                &larr; Kembali
            </a>
            <a href="{{ route('user.surat-tugas.export-doc', ['id' => $suratTugas->id, 'type' => 'st']) }}" class="btn btn-success">
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

        <!-- JUDUL -->
        <div class="judul-surat">
            <h4>SURAT TUGAS</h4>
            <p>Nomor : {{ $suratTugas->nomor_st }}</p>
        </div>

        <!-- DASAR -->
        <table class="table-content">
            <tr>
                <td class="label-col">Dasar</td>
                <td class="titik-dua">:</td>
                <td class="text-justify">{!! nl2br(e($suratTugas->dasar_surat)) !!}</td>
            </tr>
        </table>

        <div style="text-align: center; font-weight: bold; margin: 12px 0 10px 0; letter-spacing: 2px;">
            MEMERINTAHKAN :
        </div>

        <!-- KEPADA -->
        <table class="table-content">
            <tr>
                <td class="label-col">Kepada</td>
                <td class="titik-dua">:</td>
                <td>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td style="width: 110px;">Nama</td>
                            <td style="width: 15px;">:</td>
                            <td><strong>{{ $suratTugas->nama_pegawai }}</strong></td>
                        </tr>
                        @if($suratTugas->nip_pegawai)
                        <tr>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{ $suratTugas->nip_pegawai }}</td>
                        </tr>
                        @endif
                        @if($suratTugas->pangkat_golongan)
                        <tr>
                            <td>Pangkat / Gol.</td>
                            <td>:</td>
                            <td>{{ $suratTugas->pangkat_golongan }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td>{{ $suratTugas->jabatan_pegawai }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- UNTUK -->
        <table class="table-content" style="margin-top: 6px;">
            <tr>
                <td class="label-col">Untuk</td>
                <td class="titik-dua">:</td>
                <td class="text-justify">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td style="width: 20px; vertical-align: top;">1.</td>
                            <td class="text-justify">{{ $suratTugas->maksud_tugas }}</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">2.</td>
                            <td class="text-justify">
                                Lamanya penugasan selama <strong>{{ $suratTugas->durasi_hari }} ({{ $suratTugas->durasi_hari == 1 ? 'satu' : ($suratTugas->durasi_hari == 2 ? 'dua' : ($suratTugas->durasi_hari == 3 ? 'tiga' : ($suratTugas->durasi_hari == 4 ? 'empat' : ($suratTugas->durasi_hari == 5 ? 'lima' : $suratTugas->durasi_hari)))) }}) hari</strong>, terhitung mulai tanggal <strong>{{ $suratTugas->hari_tanggal_teks }}</strong>.
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">3.</td>
                            <td class="text-justify">
                                Tempat Pelaksanaan: <strong>{{ $suratTugas->tempat_tujuan }}</strong>.
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">4.</td>
                            <td class="text-justify">
                                Melaksanakan tugas ini dengan penuh tanggung jawab dan menyampaikan laporan hasil pelaksanaan tugas kepada pejabat yang berwenang setelah selesai.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- TANDA TANGAN -->
        <div class="ttd-container">
            <table class="ttd-table">
                <tr>
                    <td style="width: 50%;"></td>
                    <td class="ttd-box">
                        <p style="margin: 0;">Ditetapkan di : Jeneponto</p>
                        <p style="margin: 0 0 8px 0;">Pada tanggal : {{ \Carbon\Carbon::parse($suratTugas->tanggal_surat)->translatedFormat('d F Y') }}</p>
                        <p style="margin: 0; font-weight: bold;">
                            {{ $suratTugas->pejabat_jabatan }}
                        </p>
                        <div style="height: 65px;"></div>
                        <p style="margin: 0; font-weight: bold; text-decoration: underline;">
                            {{ $suratTugas->pejabat_nama }}
                        </p>
                        @if($suratTugas->pejabat_pangkat)
                        <p style="margin: 0; font-size: 11pt;">
                            {{ $suratTugas->pejabat_pangkat }}
                        </p>
                        @endif
                        @if($suratTugas->pejabat_nip)
                        <p style="margin: 0; font-size: 11pt;">
                            NIP. {{ $suratTugas->pejabat_nip }}
                        </p>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>
