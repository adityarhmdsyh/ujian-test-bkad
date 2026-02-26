@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Dashboard Pengaduan Masyarakat</h2>
        <span class="text-sm text-gray-500">{{ now()->format('d M Y') }}</span>
    </div>

    <hr class="border-gray-200 mb-8">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-blue-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-300">
            <h5 class="text-blue-100 uppercase tracking-wider text-sm font-semibold">Total Laporan</h5>
            <h3 class="text-4xl font-bold mt-2">{{ $stats['total_laporan'] }}</h3>
        </div>

        <div class="bg-cyan-500 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-300">
            <h5 class="text-cyan-100 uppercase tracking-wider text-sm font-semibold">Total Pelapor</h5>
            <h3 class="text-4xl font-bold mt-2">{{ $stats['total_pelapor'] }}</h3>
        </div>

        <div class="bg-amber-400 rounded-xl shadow-lg p-6 text-gray-800 transform hover:scale-105 transition duration-300">
            <h5 class="text-amber-800 uppercase tracking-wider text-sm font-semibold">Diproses</h5>
            <h3 class="text-4xl font-bold mt-2">{{ $stats['status_proses'] }}</h3>
        </div>

        <div class="bg-emerald-500 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-300">
            <h5 class="text-emerald-100 uppercase tracking-wider text-sm font-semibold">Selesai</h5>
            <h3 class="text-4xl font-bold mt-2">{{ $stats['status_selesai'] }}</h3>
        </div>
    </div>

    <div class="mt-12 bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
            <h4 class="text-lg font-bold text-gray-700">Rekap Laporan Per Bulan (Database View)</h4>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-4 px-6 font-bold">Bulan</th>
                        <th class="py-4 px-6 font-bold text-center">Tahun</th>
                        <th class="py-4 px-6 font-bold text-center">Masuk</th>
                        <th class="py-4 px-6 font-bold text-center">Diproses</th>
                        <th class="py-4 px-6 font-bold text-center">Selesai</th>
                        <th class="py-4 px-6 font-bold text-center">Ditolak</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach($rekapBulanan as $data)
                    <tr class="border-b border-gray-50 hover:bg-gray-50 transition duration-200">
                        <td class="py-4 px-6 font-medium text-gray-900">
                            {{ date("F", mktime(0, 0, 0, $data->bulan, 10)) }}
                        </td>
                        <td class="py-4 px-6 text-center italic text-gray-500">{{ $data->tahun }}</td>
                        <td class="py-4 px-6 text-center">
                            <span class="bg-blue-100 text-blue-700 py-1 px-3 rounded-full font-bold">
                                {{ $data->jumlah_laporan_masuk }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center font-semibold text-amber-600">{{ $data->jumlah_diproses }}</td>
                        <td class="py-4 px-6 text-center font-semibold text-emerald-600">{{ $data->jumlah_selesai }}</td>
                        <td class="py-4 px-6 text-center font-semibold text-red-500">{{ $data->jumlah_ditolak }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection