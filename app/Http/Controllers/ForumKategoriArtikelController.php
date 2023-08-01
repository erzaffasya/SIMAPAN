<?php

namespace App\Http\Controllers;

use App\Models\ForumKategoriArtikel;
use Illuminate\Http\Request;

class ForumKategoriArtikelController extends Controller
{
    public function index()
    {
        $forum_kategori_artikel = ForumKategoriArtikel::all();
        return view('admin.forum.kategori_artikel.index', compact('forum_kategori_artikel'));
    }

    public function create()
    {
        return view('admin.forum.kategori_artikel.tambah');
    }

    public function store(Request $request)
    {
        ForumKategoriArtikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect()->route('forum-kategori-artikel.index')
            ->with('success', 'Kategori Artikel Berhasil Ditambahkan');
    }

    public function show(ForumKategoriArtikel $forum_kategori_artikel)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumKategoriArtikel  $forum_kategori_artikel
     */
    public function edit(ForumKategoriArtikel $forum_kategori_artikel)
    {
        return view('admin.forum.kategori_artikel.ubah', compact('forum_kategori_artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumKategoriArtikel  $forum_kategori_artikel
     */
    public function update(Request $request, ForumKategoriArtikel $forum_kategori_artikel)
    {
        $forum_kategori_artikel->judul = $request->judul;
        $forum_kategori_artikel->isi = $request->isi;
        $forum_kategori_artikel->save();

        return redirect()->route('forum-kategori-artikel.index')->with('success', 'Kategori Artikel Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumKategoriArtikel  $forum_kategori_artikel
     */
    public function destroy(ForumKategoriArtikel $forum_kategori_artikel)
    {
        $artikel = $forum_kategori_artikel->artikel;
        if ($artikel->isEmpty()) {
            $forum_kategori_artikel->delete();
            return redirect()->route('forum-kategori-artikel.index')->with('success', 'Kategori Artikel Berhasil Ditambahkan');
        }
        return redirect()->route('forum-kategori-artikel.index')->with('success', 'Kategori Artikel Tidak Dapat Di HAPUS');
    }
}