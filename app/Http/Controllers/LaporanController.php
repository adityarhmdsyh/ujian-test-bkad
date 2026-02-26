<?php

namespace App\Http\Controllers;

use App\Models\KategoriLaporan;
use App\Models\Laporan;
use App\Models\Pelapor;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporans = Laporan::with(['kategori', 'pelapor'])->latest()->paginate(10);
        return view('admin.laporan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriLaporan::all();
        $pelapors = Pelapor::all();
        return view('admin.laporan.create', compact('kategoris', 'pelapors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelapor_id' => 'required',
            'kategori_id' => 'required',
            'judul' => 'required|min:5',
            'isi_laporan' => 'required',
            'tgl_laporan' => 'required|date',
        ]);

        Laporan::create($request->all() + ['status' => 'Diajukan']);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laporan = Laporan::with(['kategori', 'pelapor', 'tanggapan.user'])->findOrFail($id);
        return view('admin.laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);
    $kategoris = KategoriLaporan::all();
    $pelapors = Pelapor::all();
    
    return view('admin.laporan.edit', compact('laporan', 'kategoris', 'pelapors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'pelapor_id' => 'required',
        'kategori_id' => 'required',
        'judul' => 'required|min:5',
        'isi_laporan' => 'required',
        'tgl_laporan' => 'required|date',
        'status' => 'required|in:Diajukan,Diproses,Selesai,Ditolak',
    ]);

    $laporan = Laporan::findOrFail($id);
    $laporan->update($request->all());

    return redirect()->route('laporan.index')->with('success', 'Data laporan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('danger', 'Laporan berhasil dihapus!');
    }
}
