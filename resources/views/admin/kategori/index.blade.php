@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
            <div>
                <h3 class="text-2xl font-bold text-gray-800">Daftar Kategori</h3>
                <p class="text-sm text-gray-500">Kelola kategori laporan pengaduan masyarakat</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('kategori.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-md transition duration-200">
                    <i class="bi bi-plus-lg mr-2"></i> Tambah Kategori
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Kategori
                            </th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($kategoris as $k)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $k->nama_kategori }}</td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end items-center space-x-2">
                                        

                                        <a href="{{ route('kategori.edit', $k->id) }}"
                                            class="inline-flex items-center justify-center w-9 h-9 text-gray-400 bg-gray-50 hover:text-amber-600 hover:bg-amber-100 rounded-xl transition-all duration-200 border border-gray-100"
                                            title="Edit">
                                            <i class="bi bi-pencil-square text-base"></i>
                                        </a>

                                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="inline"
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
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-10 text-center text-gray-400 italic">
                                    Belum ada data kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
