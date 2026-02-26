@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Rekap Laporan Bulanan</h3>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8">
            <form action="{{ route('rekap.index') }}" method="GET" class="flex flex-wrap md:flex-nowrap gap-4 items-end">
                <div class="flex-1 min-w-[150px]">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Bulan</label>
                    <select name="bulan"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="">Semua Bulan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="flex-1 min-w-[150px]">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tahun</label>
                    <select name="tahun"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="">Semua Tahun</option>
                        @for ($y = date('Y'); $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
                                {{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex space-x-2">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded-lg transition duration-200">
                        Filter
                    </button>
                    <a href="{{ route('rekap.cetak', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}"
                        class="inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-xl shadow-lg transition duration-200">
                        <i class="bi bi-file-earmark-pdf-fill mr-2"></i> Cetak Laporan
                    </a>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest text-center">
                        <tr>
                            <th class="px-6 py-4 font-semibold text-left">Periode</th>
                            <th class="px-6 py-4 font-semibold">Total Masuk</th>
                            <th class="px-6 py-4 font-semibold">Diproses</th>
                            <th class="px-6 py-4 font-semibold">Selesai</th>
                            <th class="px-6 py-4 font-semibold">Ditolak</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-center">
                        @forelse($rekap as $r)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-left text-sm font-bold text-gray-800">
                                    {{ date('F', mktime(0, 0, 0, $r->bulan, 1)) }} {{ $r->tahun }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-blue-600">
                                    {{ $r->jumlah_laporan_masuk }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $r->jumlah_diproses }}
                                </td>
                                <td class="px-6 py-4  font-bold">
                                    {{ $r->jumlah_selesai }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $r->jumlah_ditolak }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                    Data rekap tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
