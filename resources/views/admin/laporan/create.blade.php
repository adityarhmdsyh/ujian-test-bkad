@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-gray-800">Input Laporan Baru</h3>
            <p class="text-sm text-gray-500">Silakan isi detail pengaduan masyarakat di bawah ini.</p>
        </div>
        <a href="{{ route('laporan.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
            <i class="bi bi-arrow-left mr-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ route('laporan.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pelapor</label>
                        <select name="pelapor_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-gray-50" required>
                            <option value="" disabled selected>Pilih Pelapor</option>
                            @foreach($pelapors as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Laporan</label>
                        <select name="kategori_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-gray-50" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($kategoris as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Laporan</label>
                    <input type="text" name="judul" placeholder="Contoh: Jalan rusak di desa X" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Laporan / Deskripsi</label>
                    <textarea name="isi_laporan" rows="5" placeholder="Jelaskan secara detail kejadian atau keluhan..." class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" required></textarea>
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pt-4 border-t border-gray-50">
                    <div class="w-full md:w-1/3">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Kejadian</label>
                        <input type="date" name="tgl_laporan" value="{{ date('Y-m-d') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" required>
                    </div>
                    <div class="w-full md:w-1/2">
                        <label class="hidden md:block text-sm font-semibold text-transparent mb-2">Aksi</label>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-blue-200 transition duration-300 flex items-center justify-center">
                            <i class="bi bi-send-fill mr-2"></i> Simpan & Kirim Laporan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection