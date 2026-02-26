@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
        <div>
            <h3 class="text-2xl font-bold text-gray-800 tracking-tight">Daftar Pengaduan</h3>
            <p class="text-sm text-gray-500">Pantau dan kelola semua laporan masuk dari masyarakat.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('laporan.create') }}" 
               class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-200 transition duration-200">
                <i class="bi bi-plus-circle-fill mr-2"></i> Buat Laporan Baru
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left table-auto min-w-[1000px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-400 text-xs uppercase tracking-widest">
                        <th class="px-6 py-4 font-semibold w-[15%]">Tanggal</th>
                        <th class="px-6 py-4 font-semibold w-[20%]">Pelapor</th>
                        <th class="px-6 py-4 font-semibold w-[25%]">Judul Laporan</th>
                        <th class="px-6 py-4 font-semibold w-[15%]">Kategori</th>
                        <th class="px-6 py-4 font-semibold text-center w-[10%]">Status</th>
                        <th class="px-6 py-4 font-semibold text-right w-[15%]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($laporans as $l)
                    <tr class="hover:bg-blue-50/40 transition duration-150 group">
                        <td class="px-6 py-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="bi bi-calendar3 mr-2 text-gray-400 text-xs"></i>
                                {{ \Carbon\Carbon::parse($l->tgl_laporan)->format('d M Y') }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-gray-800">{{ $l->pelapor->nama }}</span>
                                <span class="text-[11px] text-gray-400 flex items-center mt-0.5">
                                    <i class="bi bi-person-badge mr-1"></i> ID: #{{ $l->pelapor->id }}
                                </span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-700 font-medium truncate max-w-[250px]" title="{{ $l->judul }}">
                                {{ $l->judul }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-2"></span>
                                {{ $l->kategori->nama_kategori }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            @php
                                $statusClasses = [
                                    'Selesai' => 'bg-emerald-100 text-emerald-700 ring-emerald-600/10',
                                    'Diproses' => 'bg-blue-100 text-blue-700 ring-blue-600/10',
                                    'Ditolak' => 'bg-red-100 text-red-700 ring-red-600/10',
                                    'Diajukan' => 'bg-amber-100 text-amber-700 ring-amber-600/10',
                                ];
                                $class = $statusClasses[$l->status] ?? 'bg-gray-100 text-gray-700';
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-tighter ring-1 ring-inset {{ $class }}">
                                {{ $l->status }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-2">
                                <a href="{{ route('laporan.show', $l->id) }}" class="p-2 text-cyan-600 hover:bg-cyan-50 rounded-lg transition-colors" title="Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('laporan.edit', $l->id) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('laporan.destroy', $l->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus laporan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($laporans->hasPages())
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
            {{ $laporans->links() }}
        </div>
        @endif
    </div>
</div>
@endsection