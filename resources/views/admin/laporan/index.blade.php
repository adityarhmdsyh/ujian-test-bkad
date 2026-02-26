@extends('layouts.app')

@section('content')
<div class="container mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <h3 class="text-2xl font-bold text-gray-800">Daftar Laporan</h3>
                <p class="text-sm text-gray-500">Kelola Laporan pengaduan masyarakat</p>
            </div>
            <div class="mt-6 md:mt-0 flex space-x-3">
                
                <a href="{{ route('laporan.create') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-0.5 transition-all duration-200">
                    <i class="bi bi-plus-lg mr-2"></i> Buat Laporan
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-0">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th
                                class="px-8 py-5 text-[11px] font-bold uppercase tracking-widest text-gray-400 border-b border-gray-100">
                                Pelapor & Tanggal</th>
                            <th
                                class="px-6 py-5 text-[11px] font-bold uppercase tracking-widest text-gray-400 border-b border-gray-100">
                                Judul Pengaduan</th>
                            <th
                                class="px-6 py-5 text-[11px] font-bold uppercase tracking-widest text-gray-400 border-b border-gray-100 text-center">
                                Kategori</th>
                            <th
                                class="px-6 py-5 text-[11px] font-bold uppercase tracking-widest text-gray-400 border-b border-gray-100 text-center">
                                Status</th>
                            <th
                                class="px-8 py-5 text-[11px] font-bold uppercase tracking-widest text-gray-400 border-b border-gray-100 text-right">
                                Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($laporans as $l)
                            <tr class="group hover:bg-blue-50/30 transition-colors duration-150">
                                <td class="px-8 py-6">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-bold text-gray-800 group-hover:text-blue-700 transition-colors">{{ $l->pelapor->nama }}</span>
                                        <span class="text-xs text-gray-400 mt-1 flex items-center">
                                            <i class="bi bi-calendar4-event mr-1.5"></i>
                                            {{ \Carbon\Carbon::parse($l->tgl_laporan)->format('d M, Y') }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-6">
                                    <p class="text-sm text-gray-600 font-medium line-clamp-1 max-w-[300px]"
                                        title="{{ $l->judul }}">
                                        {{ $l->judul }}
                                    </p>
                                </td>

                                <td class="px-6 py-6 text-center">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-lg text-[11px] font-bold bg-gray-100 text-gray-600 border border-gray-200">
                                        {{ $l->kategori->nama_kategori }}
                                    </span>
                                </td>

                                <td class="px-6 py-6 text-center">
                                    @php
                                        $statusClasses = [
                                            'Selesai' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                            'Diproses' => 'bg-blue-50 text-blue-600 border-blue-100',
                                            'Ditolak' => 'bg-rose-50 text-rose-600 border-rose-100',
                                            'Diajukan' => 'bg-amber-50 text-amber-600 border-amber-100',
                                        ];
                                        $class =
                                            $statusClasses[$l->status] ?? 'bg-gray-50 text-gray-500 border-gray-100';
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-black uppercase tracking-wider border {{ $class }}">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current mr-2 animate-pulse"></span>
                                        {{ $l->status }}
                                    </span>
                                </td>

                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end items-center space-x-2">
                                        <a href="{{ route('laporan.show', $l->id) }}"
                                            class="inline-flex items-center justify-center w-9 h-9 text-gray-400 bg-gray-50 hover:text-cyan-600 hover:bg-cyan-100 rounded-xl transition-all duration-200 border border-gray-100"
                                            title="Lihat Detail">
                                            <i class="bi bi-arrow-right-short text-2xl"></i>
                                        </a>

                                        <a href="{{ route('laporan.edit', $l->id) }}"
                                            class="inline-flex items-center justify-center w-9 h-9 text-gray-400 bg-gray-50 hover:text-amber-600 hover:bg-amber-100 rounded-xl transition-all duration-200 border border-gray-100"
                                            title="Edit">
                                            <i class="bi bi-pencil-square text-base"></i>
                                        </a>

                                        <form action="{{ route('laporan.destroy', $l->id) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Hapus laporan ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center justify-center w-9 h-9 text-gray-400 bg-gray-50 hover:text-rose-600 hover:bg-rose-100 rounded-xl transition-all duration-200 border border-gray-100">
                                                <i class="bi bi-trash3 text-base"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($laporans->hasPages())
                <div class="px-8 py-6 bg-white border-t border-gray-50">
                    {{ $laporans->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
