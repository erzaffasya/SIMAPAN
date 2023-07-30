<?php

namespace App\Http\Controllers;

use App\Models\ForumKategoriGaleri;
use Illuminate\Http\Request;

class ForumKategoriGaleriController extends Controller
{
    public function index()
    {
        $forum_kategori_galeri = ForumKategoriGaleri::all();
        return view('admin.forum.kategori_galeri.index', compact('forum_kategori_galeri'));
    }

    public function create()
    {
        return view('admin.forum.kategori_galeri.tambah');
    }

    public function store(Request $request)
    {
        ForumKategoriGaleri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('forum-kategori-galeri.index')
            ->with('success', 'Kategori Galeri Berhasil Ditambahkan');
    }

    public function show(ForumKategoriGaleri $forum_kategori_galeri)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumKategoriGaleri  $forum_kategori_galeri
     */
    public function edit(ForumKategoriGaleri $forum_kategori_galeri)
    {
        return view('admin.forum.kategori_galeri.ubah', compact('forum_kategori_galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumKategoriGaleri  $forum_kategori_galeri
     */
    public function update(Request $request, ForumKategoriGaleri $forum_kategori_galeri)
    {
        $forum_kategori_galeri->judul = $request->judul;
        $forum_kategori_galeri->deskripsi = $request->deskripsi;
        $forum_kategori_galeri->save();

        return redirect()->route('forum-kategori-galeri.index')->with('success', 'Kategori Galeri Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumKategoriGaleri  $forum_kategori_galeri
     */
    public function destroy(ForumKategoriGaleri $forum_kategori_galeri)
    {
        $galeri = $forum_kategori_galeri->galeri;
        if ($galeri->isEmpty()) {
            $forum_kategori_galeri->delete();
            return redirect()->route('forum-kategori-galeri.index')->with('success', 'Kategori Galeri Berhasil Ditambahkan');
        }
        return redirect()->route('forum-kategori-galeri.index')->with('success', 'Kategori Galeri Tidak Dapat Di HAPUS');
    }
}