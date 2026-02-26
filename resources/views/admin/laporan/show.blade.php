@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-6xl">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-800">Detail Laporan #{{ $laporan->id }}</h3>
        <a href="{{ route('laporan.index') }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 transition">
            <i class="bi bi-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-7">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-blue-600 px-6 py-4">
                    <h4 class="text-white font-semibold">Informasi Pengaduan</h4>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                            {{ $laporan->kategori->nama_kategori }}
                        </span>
                        <span class="text-sm text-gray-400">
                            <i class="bi bi-clock mr-1"></i> {{ \Carbon\Carbon::parse($laporan->tgl_laporan)->format('d M Y') }}
                        </span>
                    </div>
                    
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $laporan->judul }}</h2>
                    <p class="text-sm text-gray-500 mb-6 italic">Oleh: <span class="text-gray-700 font-medium">{{ $laporan->pelapor->nama }}</span></p>
                    
                    <div class="bg-gray-50 rounded-xl p-5 mb-6">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $laporan->isi_laporan }}</p>
                    </div>

                    <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500 mr-3">Status Saat Ini:</span>
                        @php
                            $statusClasses = [
                                'Selesai' => 'bg-emerald-100 text-emerald-700',
                                'Diproses' => 'bg-blue-100 text-blue-700',
                                'Ditolak' => 'bg-red-100 text-red-700',
                                'Diajukan' => 'bg-amber-100 text-amber-700',
                            ];
                            $class = $statusClasses[$laporan->status] ?? 'bg-gray-100 text-gray-700';
                        @endphp
                        <span class="px-4 py-1 {{ $class }} text-xs font-bold rounded-full shadow-sm">
                            {{ $laporan->status }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-5 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-[400px]">
                <div class="bg-gray-800 px-6 py-4">
                    <h4 class="text-white font-semibold flex items-center">
                        <i class="bi bi-chat-left-text mr-2"></i> Riwayat Tanggapan
                    </h4>
                </div>
                <div class="p-6 overflow-y-auto flex-grow space-y-4 custom-scrollbar">
                    @forelse($laporan->tanggapan as $t)
                        <div class="bg-gray-50 rounded-lg p-4 relative group border border-gray-100">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-sm font-bold text-gray-800">{{ $t->user->name }}</span>
                                <span class="text-[10px] text-gray-400">{{ \Carbon\Carbon::parse($t->tgl_tanggapan)->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">{{ $t->tanggapan }}</p>
                            
                            <form action="{{ route('tanggapan.destroy', $t->id) }}" method="POST" class="mt-2 text-right">
                                @csrf @method('DELETE')
                                <button class="text-[10px] font-bold text-red-400 hover:text-red-600 uppercase transition" onclick="return confirm('Hapus tanggapan?')">
                                    <i class="bi bi-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center h-full text-gray-400">
                            <i class="bi bi-chat-dots text-4xl mb-2"></i>
                            <p class="text-sm">Bel_um ada tanggapan.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md border border-blue-100 p-6">
                <form action="{{ route('tanggapan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Beri Tanggapan Resmi</label>
                        <textarea name="tanggapan" 
                                  class="w-full px-4 py-3 rounded-xl border @error('tanggapan') border-red-500 bg-red-50 @else border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @enderror outline-none transition duration-200 text-sm" 
                                  rows="3" 
                                  placeholder="Tulis solusi atau instruksi lanjut..."></textarea>
                        @error('tanggapan')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-100 transition duration-300">
                        Kirim Tanggapan <i class="bi bi-send ml-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection