<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategori_artikel = KategoriArtikel::all();
        return view('admin.kategori_artikel.index', compact('kategori_artikel'));
    }

    public function create()
    {
        return view('admin.kategori_artikel.tambah');
    }

    public function store(Request $request)
    {
        KategoriArtikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect()->route('kategori-artikel.index')
            ->with('success', 'Kategori Artikel Berhasil Ditambahkan');
    }

    public function show(KategoriArtikel $kategori_artikel)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriArtikel  $kategori_artikel
     */
    public function edit(KategoriArtikel $kategori_artikel)
    {
        return view('admin.kategori_artikel.ubah', compact('kategori_artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriArtikel  $kategori_artikel
     */
    public function update(Request $request, KategoriArtikel $kategori_artikel)
    {
        $kategori_artikel->judul = $request->judul;
        $kategori_artikel->isi = $request->isi;
        $kategori_artikel->save();

        return redirect()->route('kategori-artikel.index')->with('success', 'Kategori Artikel Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriArtikel  $kategori_artikel
     */
    public function destroy(KategoriArtikel $kategori_artikel)
    {
        $artikel = $kategori_artikel->artikel;
        if ($artikel->isEmpty()) {
            $kategori_artikel->delete();
            return redirect()->route('kategori-artikel.index')->with('success', 'Kategori Artikel Berhasil Ditambahkan');
        }
        return redirect()->route('kategori-artikel.index')->with('success', 'Kategori Artikel Tidak Dapat Di HAPUS');
    }
}