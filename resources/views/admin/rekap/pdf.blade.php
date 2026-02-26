<!DOCTYPE html>
<html>
<head>
    <title>Detail Data Mentah Laporan</title>
    <style>
        body { font-family: sans-serif; font-size: 10px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
        .center { text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>DETAIL DATA MENTAH PENGADUAN MASYARAKAT</h2>
        <p>Filter Periode: 
            {{ request('bulan') ? date('F', mktime(0, 0, 0, request('bulan'), 1)) : 'Semua Bulan' }} 
            {{ request('tahun') ?? 'Semua Tahun' }}
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="12%">Tgl Laporan</th>
                <th width="15%">Nama Pelapor</th>
                <th width="15%">Kategori</th>
                <th width="20%">Judul Laporan</th>
                <th>Isi Laporan</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporan as $row)
            <tr>
                <td class="center">{{ $loop->iteration }}</td>
                <td class="center">{{ \Carbon\Carbon::parse($row->tgl_laporan)->format('d/m/Y') }}</td>
                <td>{{ $row->pelapor->nama }}</td>
                <td>{{ $row->kategori->nama_kategori }}</td>
                <td>{{ $row->judul }}</td>
                <td>{{ $row->isi_laporan }}</td>
                <td class="center">{{ $row->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="center">Tidak ada data untuk periode ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>