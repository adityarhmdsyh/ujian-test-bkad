@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-gray-800">Edit Kategori</h3>
            <p class="text-sm text-gray-500">Ubah informasi kategori laporan</p>
        </div>
        <a href="{{ route('kategori.index') }}" 
        class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-lg transition duration-200">
            <i class="bi bi-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-6">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="nama_kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Kategori
                    </label>
                    <input type="text" 
                        name="nama_kategori" 
                        id="nama_kategori"
                        class="w-full px-4 py-2 rounded-lg border @error('nama_kategori') border-red-500 bg-red-50 @else border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @enderror transition duration-200 outline-none" 
                        value="{{ old('nama_kategori', $kategori->nama_kategori) }}" 
                        placeholder="Masukkan nama kategori..."
                        required>
                    
                    @error('nama_kategori')
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            <i class="bi bi-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col space-y-3">
                    <button type="submit" 
                            class="w-full py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-lg shadow-lg shadow-amber-200 transition duration-200">
                        Perbarui Kategori
                    </button>
                    <p class="text-xs text-center text-gray-400">
                        Pastikan nama kategori belum pernah digunakan sebelumnya.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection