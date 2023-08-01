<?php

namespace App\Http\Controllers;

use App\Models\ForumKategoriArtikel;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\ForumArtikel;
use Str;

class ForumArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $forum_artikel = ForumArtikel::all();
        return view('admin.forum.artikel.index', compact('forum_artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $lKategori = ForumKategoriArtikel::all();
        return view('admin.forum.artikel.tambah', compact('lKategori'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif',
        ]);


        if ($request->foto) {
            $path = storage_path("app/public/img/forum_artikel/$request->id_kategori");
            $path_tmp = storage_path("app/public/img/.thumbnail/forum_artikel/$request->id_kategori");
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists("$path")) {
                File::makeDirectory("$path", $mode = 0777, true, true);
            }
            if (!File::exists("$path_tmp")) {
                File::makeDirectory("$path_tmp", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");
            $image_tmp = Image::make($request->file('foto'));
            $image_tmp->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists("$path_tmp")) {
                File::makeDirectory("$path_tmp", $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$file_name");
        } else {
            $file_name = null;
        }

        ForumArtikel::create([
            "id_kategori_artikel" => $request->id_kategori,
            "slug" => Str::slug($request->title),
            "foto" => $file_name,
            "thumbnail" => $file_name,
            "judul" => $request->judul,
            "isi" => $request->isi
        ]);


        return redirect()->route('forum-artikel.index')
            ->with('success', 'ForumArtikel Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumArtikel  $forum_artikel
     */
    public function show(ForumArtikel $forum_artikel)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumArtikel  $forum_artikel
     */
    public function edit(ForumArtikel $forum_artikel)
    {
        $lKategori = ForumKategoriArtikel::all();
        return view('admin.forum.artikel.ubah', compact('lKategori', 'forum_artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumArtikel  $forum_artikel
     */
    public function update(Request $request, ForumArtikel $forum_artikel)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);


        if ($request->foto) {
            $path = storage_path("app/public/img/forum_artikel");
            $path_tmp = storage_path("app/public/img/.thumbnail/forum_artikel");
            if (File::exists("$path/$forum_artikel->id_kategori/$forum_artikel->foto")) {
                File::delete("$path/$forum_artikel->id_kategori/$forum_artikel->foto");
            }
            if (File::exists("$path_tmp/$forum_artikel->id_kategori/$forum_artikel->foto")) {
                File::delete("$path_tmp/$forum_artikel->id_kategori/$forum_artikel->foto");
            }
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists("$path/$request->id_kategori")) {
                File::makeDirectory("$path/$request->id_kategori", $mode = 0777, true, true);
            }
            $image->save("$path/$request->id_kategori/$file_name");
            $image_tmp = Image::make($request->file('foto'));
            $image_tmp->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::exists("$path_tmp/$request->id_kategori")) {
                File::makeDirectory("$path_tmp/$request->id_kategori", $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$request->id_kategori/$file_name");
        } else {
            $file_name = $forum_artikel->foto;
        }

        $forum_artikel->id_kategori_artikel = $request->id_kategori;
        $forum_artikel->judul = $request->judul;
        $forum_artikel->slug = Str::slug($request->judul);
        $forum_artikel->foto = $file_name;
        $forum_artikel->thumbnail = $file_name;
        $forum_artikel->isi = $request->isi;
        $forum_artikel->save();

        return redirect()->route('forum-artikel.index')
            ->with('success', 'ForumArtikel Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumArtikel  $forum_artikel
     */
    public function destroy(ForumArtikel $forum_artikel)
    {
        $path = storage_path("app/public/img/forum_artikel");
        $path_tmp = storage_path("app/public/img/.thumbnail/forum_artikel");
        if (File::exists("$path/$forum_artikel->id_kategori/$forum_artikel->foto")) {
            File::delete("$path/$forum_artikel->id_kategori/$forum_artikel->foto");
        }
        if (File::exists("$path_tmp/$forum_artikel->id_kategori/$forum_artikel->foto")) {
            File::delete("$path_tmp/$forum_artikel->id_kategori/$forum_artikel->foto");
        }
        $forum_artikel->delete();


        return redirect()->route('forum-artikel.index')
            ->with('success', 'ForumArtikel Berhasil Dihapus');
    }
}
