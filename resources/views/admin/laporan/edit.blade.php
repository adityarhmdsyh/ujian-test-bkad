@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-gray-800">Edit Laporan #{{ $laporan->id }}</h3>
            <p class="text-sm text-gray-500">Lakukan perubahan pada data laporan masyarakat jika terdapat kekeliruan.</p>
        </div>
        <a href="{{ route('laporan.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-lg transition duration-200">
            <i class="bi bi-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pelapor</label>
                        <select name="pelapor_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-gray-50" required>
                            @foreach($pelapors as $p)
                                <option value="{{ $p->id }}" {{ $laporan->pelapor_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Laporan</label>
                        <select name="kategori_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-gray-50" required>
                            @foreach($kategoris as $k)
                                <option value="{{ $k->id }}" {{ $laporan->kategori_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Laporan</label>
                    <input type="text" name="judul" value="{{ old('judul', $laporan->judul) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Laporan</label>
                    <textarea name="isi_laporan" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" required>{{ old('isi_laporan', $laporan->isi_laporan) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-50">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Kejadian</label>
                        <input type="date" name="tgl_laporan" value="{{ $laporan->tgl_laporan }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Laporan</label>
                        <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 bg-gray-50" required>
                            @foreach(['Diajukan', 'Diproses', 'Selesai', 'Ditolak'] as $st)
                                <option value="{{ $st }}" {{ $laporan->status == $st ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex items-center space-x-3 pt-4">
                    <button type="submit" class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-amber-100 transition duration-300">
                        <i class="bi bi-check-circle-fill mr-2"></i> Perbarui Laporan
                    </button>
                    <a href="{{ route('laporan.index') }}" class="px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-xl transition duration-200">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection