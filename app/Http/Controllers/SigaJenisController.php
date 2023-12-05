<?php

namespace App\Http\Controllers;

use App\Models\SigaJenis;
use Illuminate\Http\Request;

class SigaJenisController extends Controller
{
    public function index()
    {
        $sigaJenis = SigaJenis::all();
        return view('admin.siga.jenis.index', compact('sigaJenis'));
    }

    public function create()
    {
        return view('admin.siga.jenis.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            "judul" => "required"
        ]);

        SigaJenis::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);


        return redirect()->route('jenis-siga.index')
            ->with('success', 'SigaJenis Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $sigaJenis = SigaJenis::find($id);
        return view('admin.siga.jenis.ubah', compact('sigaJenis'));
    }

    public function update(Request $request, SigaJenis $sigaJenis)
    {
        $sigaJenis->judul = $request->judul;
        $sigaJenis->deskripsi = $request->deskripsi;
        $sigaJenis->save();

        return redirect()->route('jenis-siga.index')
            ->with('success', 'SigaJenis Berhasil Diubah');
    }

    public function destroy($id)
    {

        $sigaJenis = SigaJenis::find($id);
        $sigaJenis->delete();
        return redirect()->route('jenis-siga.index')
            ->with('success', 'SigaJenis Berhasil Dihapus');
    }
}
