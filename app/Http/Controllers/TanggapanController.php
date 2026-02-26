<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'laporan_id' => 'required|exists:laporans,id',
            'tanggapan' => 'required|min:5',
        ]);

        Tanggapan::create([
            'laporan_id' => $request->laporan_id,
            'user_id' => auth()->id(),
            'tanggapan' => $request->tanggapan,
            'tgl_tanggapan' => now(),
        ]);

        Laporan::where('id', $request->laporan_id)->update(['status' => 'Selesai']);

        return redirect()->back()->with('success', 'Tanggapan berhasil dikirim dan status laporan diperbarui!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapan->delete();

        return redirect()->back()->with('danger', 'Tanggapan telah dihapus!');
    }
}
