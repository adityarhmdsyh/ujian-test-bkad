@extends('layouts.app')

@section('content')
<div class="p-6 lg:p-10">
    <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Ringkasan Data</h1>
            <p class="text-slate-500 text-sm font-medium">Statistik pengaduan per hari ini, {{ now()->translatedFormat('d F Y') }}.</p>
        </div>
        <div class="flex items-center gap-2 text-xs font-bold text-slate-400 bg-slate-100 px-4 py-2 rounded-full">
            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
            SISTEM ONLINE
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Aduan</p>
            <h2 class="text-3xl font-black text-slate-800 mt-1">{{ $stats['total_laporan'] }}</h2>
            <div class="mt-4 h-1 w-10 bg-blue-500 rounded-full"></div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Masyarakat</p>
            <h2 class="text-3xl font-black text-slate-800 mt-1">{{ $stats['total_pelapor'] }}</h2>
            <div class="mt-4 h-1 w-10 bg-cyan-500 rounded-full"></div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Proses</p>
            <h2 class="text-3xl font-black text-slate-800 mt-1">{{ $stats['status_proses'] }}</h2>
            <div class="mt-4 h-1 w-10 bg-amber-500 rounded-full"></div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Selesai</p>
            <h2 class="text-3xl font-black text-slate-800 mt-1">{{ $stats['status_selesai'] }}</h2>
            <div class="mt-4 h-1 w-10 bg-emerald-500 rounded-full"></div>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <div class="px-8 py-6 flex items-center justify-between border-b border-slate-100">
            <h3 class="font-bold text-slate-700">Laporan Bulanan</h3>
            <button class="text-xs font-bold text-blue-600 hover:underline">Lihat Semua</button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter bg-slate-50/50">
                        <th class="px-8 py-4">Periode</th>
                        <th class="px-6 py-4 text-center">Masuk</th>
                        <th class="px-6 py-4 text-center">Proses</th>
                        <th class="px-6 py-4 text-center">Selesai</th>
                        <th class="px-6 py-4 text-center">Batal</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-medium text-slate-600 divide-y divide-slate-50">
                    @foreach($rekapBulanan as $data)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-8 py-4 text-slate-900 font-bold">
                            {{ date("F", mktime(0, 0, 0, $data->bulan, 10)) }} <span class="text-slate-400 font-normal ml-1">{{ $data->tahun }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-md">{{ $data->jumlah_laporan_masuk }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">{{ $data->jumlah_diproses }}</td>
                        <td class="px-6 py-4 text-center ">{{ $data->jumlah_selesai }}</td>
                        <td class="px-6 py-4 text-center">{{ $data->jumlah_ditolak }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection