<?php

namespace App\Http\Controllers;

use App\Models\ProfilKategoriGaleri;
use Illuminate\Http\Request;

class ProfilKategoriGaleriController extends Controller
{
    public function index()
    {
        $profil_kategori_galeri = ProfilKategoriGaleri::all();
        return view('admin.profil.kategori_galeri.index', compact('profil_kategori_galeri'));
    }

    public function create()
    {
        return view('admin.profil.kategori_galeri.tambah');
    }

    public function store(Request $request)
    {
        ProfilKategoriGaleri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('profil-kategori-galeri.index')
            ->with('success', 'Kategori Galeri Berhasil Ditambahkan');
    }

    public function show(ProfilKategoriGaleri $profil_kategori_galeri)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilKategoriGaleri  $profil_kategori_galeri
     */
    public function edit(ProfilKategoriGaleri $profil_kategori_galeri)
    {
        return view('admin.profil.kategori_galeri.ubah', compact('profil_kategori_galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilKategoriGaleri  $profil_kategori_galeri
     */
    public function update(Request $request, ProfilKategoriGaleri $profil_kategori_galeri)
    {
        $profil_kategori_galeri->judul = $request->judul;
        $profil_kategori_galeri->deskripsi = $request->deskripsi;
        $profil_kategori_galeri->save();

        return redirect()->route('profil-kategori-galeri.index')->with('success', 'Kategori Galeri Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilKategoriGaleri  $profil_kategori_galeri
     */
    public function destroy(ProfilKategoriGaleri $profil_kategori_galeri)
    {
        $galeri = $profil_kategori_galeri->galeri;
        if ($galeri->isEmpty()) {
            $profil_kategori_galeri->delete();
            return redirect()->route('profil-kategori-galeri.index')->with('success', 'Kategori Galeri Berhasil Ditambahkan');
        }
        return redirect()->route('profil-kategori-galeri.index')->with('success', 'Kategori Galeri Tidak Dapat Di HAPUS');
    }
}
