<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi Karyawan</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page {
            width: 297mm;
            min-height: 210mm;
            padding: 10mm;
            margin: 0mm auto;
            background: white;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #204b8c;
        }

        .company-name {
            font-size: 20px;
            font-weight: bold;
            color: #204b8c;
            margin-bottom: 5px;
        }

        .report-title h1 {
            font-size: 24px;
            color: #204b8c;
            margin: 0;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 12px;
        }

        th {
            background-color: #204b8c;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 8px 10px;
            border-bottom: 1px solid #ddd;
        }

        .status-hadir {
            color: #28a745;
            font-weight: bold;
        }

        .status-terlambat {
            color: #ffc107;
            font-weight: bold;
        }

        .status-absen {
            color: #dc3545;
            font-weight: bold;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 150px;
            margin: 0 auto 5px;
            padding-top: 5px;
        }

        @page {
            size: A4 landscape;
            margin: 10mm;
        }
    </style>
</head>

<body>
    <div class="page">
        <!-- Header Laporan -->
        <div class="header">
            <div>
                <div class="company-name">PT. MAKMUR SEJAHTERA</div>
                <div>Jl. Pejuang No. 123, Jakarta</div>
            </div>
            <div>
                <img src="/Image/logo.perusahaan.jpg" alt="Logo Perusahaan" width="100" height="100">
            </div>
        </div>

        <!-- Judul Laporan -->
        <div class="report-title" style="text-align: center;">
            <h1>LAPORAN ABSENSI KARYAWAN</h1>
            <p>Periode: {{ $startDate ?? 'Tanggal Mulai' }} hingga {{ $endDate ?? 'Tanggal Selesai' }}</p>
        </div>

        <!-- Tabel Absensi -->
        <table border="1">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA KARYAWAN</th>
                    <th>JABATAN</th>
                    <th>TANGGAL</th>
                    <th>SHIFT</th>
                    <th>JAM MASUK</th>
                    <th>JAM PULANG</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                    $totalHadir = 0;
                    $totalTerlambat = 0;
                    $totalAbsen = 0;
                @endphp
                
                @forelse ($data ?? [] as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->karyawan->user->name ?? 'N/A' }}</td>
                        <td>{{ $d->karyawan->jabatan->nama_jabatan ?? 'N/A' }}</td>
                        <td>{{ date('d/m/Y', strtotime($d->tanggal)) }}</td>
                        <td>{{ $d->shift_id ?? '-' }}</td>
                        <td>{{ $d->jam_masuk ? date('H:i', strtotime($d->jam_masuk)) : '-' }}</td>
                        <td>{{ $d->jam_keluar ? date('H:i', strtotime($d->jam_keluar)) : '-' }}</td>
                        <td class="status-{{ strtolower($d->status) }}">
                            {{ $d->status }}
                        </td>
                    </tr>
                    @php
                        if($d->status == 'Hadir') $totalHadir++;
                        elseif($d->status == 'Terlambat') $totalTerlambat++;
                        elseif($d->status == 'Absen') $totalAbsen++;
                    @endphp
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">Tidak ada data absensi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Rekapitulasi -->
        <div style="margin-top: 20px;">
            <h3>Rekapitulasi Absensi:</h3>
            <p>Total Hadir: {{ $totalHadir }} karyawan</p>
            <p>Total Terlambat: {{ $totalTerlambat }} karyawan</p>
            <p>Total Absen: {{ $totalAbsen }} karyawan</p>
        </div>

        <!-- Tanda Tangan -->
        <div style="margin-top: 50px; text-align: right;">
            <div style="width: 200px; display: inline-block;">
                <p>Jakarta, {{ date('d F Y') }}</p>
                <div class="signature-line"></div>
                <p>Mengetahui,</p>
                <p style="margin-top: 30px;">(___________________)</p>
                <p>HRD Manager</p>
            </div>
        </div>

        <!-- Footer -->
        <div style="margin-top: 30px; text-align: center; font-size: 10px;">
            Dokumen ini dicetak secara otomatis pada {{ date('d/m/Y H:i:s') }}
        </div>
    </div>

    <!-- Tombol Cetak -->
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>