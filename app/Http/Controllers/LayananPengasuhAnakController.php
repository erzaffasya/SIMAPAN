<?php

namespace App\Http\Controllers;

use App\Models\LayananPengasuhAnak;
use Illuminate\Http\Request;

class LayananPengasuhAnakController extends Controller
{

    public function index()
    {
        $layanan_pengasuh_anak = LayananPengasuhAnak::all();
        return view('admin.layanan_pengasuh_anak.index', compact('layanan_pengasuh_anak'));
    }

    public function create()
    {
        return view('admin.layanan_pengasuh_anak.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            "tahun" => "required|unique:layanan_pengasuh_anak",
            "indoor" => "required",
            "outdoor" => "required",
            "online" => "required",
        ]);

        LayananPengasuhAnak::create([
            'tahun' => $request->tahun,
            'indoor' => $request->indoor,
            'outdoor' => $request->outdoor,
            'online' => $request->online,
        ]);
        return redirect()->route('layanan-pengasuh-anak.index')
            ->with('success', 'Persentase Anak Berhasil Ditambahkan');
    }

    public function show(LayananPengasuhAnak $layanan_pengasuh_anak)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayananPengasuhAnak  $layanan_pengasuh_anak
     */
    public function edit(LayananPengasuhAnak $layanan_pengasuh_anak)
    {

        return view('admin.layanan_pengasuh_anak.ubah', compact('layanan_pengasuh_anak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LayananPengasuhAnak  $layanan_pengasuh_anak
     */
    public function update(Request $request, LayananPengasuhAnak $layanan_pengasuh_anak)
    {
        $request->validate([
            "tahun" => "required",
            "indoor" => "required",
            "outdoor" => "required",
            "online" => "required",
        ]);

        $layanan_pengasuh_anak->tahun = $request->tahun;
        $layanan_pengasuh_anak->indoor = $request->indoor;
        $layanan_pengasuh_anak->outdoor = $request->outdoor;
        $layanan_pengasuh_anak->online = $request->online;
        $layanan_pengasuh_anak->save();

        return redirect()->route('layanan-pengasuh-anak.index')->with('success', 'Persentase Anak Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayananPengasuhAnak  $layanan_pengasuh_anak
     */
    public function destroy(LayananPengasuhAnak $layanan_pengasuh_anak)
    {
        $layanan_pengasuh_anak->delete();
        return redirect()->route('layanan-pengasuh-anak.index')->with('success', 'Persentase Anak Tidak Dapat Di HAPUS');
    }
}
