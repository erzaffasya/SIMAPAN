<?php

namespace App\Http\Controllers;

use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ForumGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $forum_galeri = ForumGaleri::all();
        return view('admin.forum.galeri.index', compact('forum_galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        $lKategori = ForumKategoriGaleri::all();
        return view('admin.forum.galeri.tambah', compact('lKategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $request->validate([
            "id_kategori_galeri" => 'required',
            "judul" => 'required',
            "foto" => 'required',
        ]);

        if ($request->foto != null) {
            $path = storage_path("app/public/img/forum_galeri/$request->id_kategori_galeri/");
            $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$request->id_kategori_galeri/");
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // check $path
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");

            $image_tmp = Image::make($request->file('foto'));
            $image_tmp->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists($path_tmp)) {
                File::makeDirectory($path_tmp, $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$file_name");
        } else {
            $file_name = null;
        }

        ForumGaleri::create([
            "id_kategori_galeri" => $request->id_kategori_galeri,
            "thumbnail" => $file_name,
            "foto" => $file_name,
            "judul" => $request->judul,
            "isi" => $request->isi,
        ]);

        return redirect()->route('forum-galeri.index')
            ->with('success', 'ForumGaleri Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumGaleri  $forum_galeri

     */
    public function show(ForumGaleri $forum_galeri)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumGaleri  $forum_galeri

     */
    public function edit(ForumGaleri $forum_galeri)
    {
        $lKategori = ForumKategoriGaleri::all();
        return view('admin.forum.galeri.ubah', compact('lKategori', 'forum_galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumGaleri  $forum_galeri

     */
    public function update(Request $request, ForumGaleri $forum_galeri)
    {
        $request->validate([
            "id_kategori_galeri" => 'required',
            "judul" => 'required',
            "foto" => 'nullable|image',
        ]);

        if ($request->foto) {
            $path = storage_path("app/public/img/forum_galeri");
            $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri");
            if (File::exists("$path/$forum_galeri->id_kategori_galeri/$forum_galeri->foto")) {
                File::delete("$path/$forum_galeri->id_kategori_galeri/$forum_galeri->foto");
            }
            if (File::exists("$path_tmp/$forum_galeri->id_kategori_galeri/$forum_galeri->foto")) {
                File::delete("$path_tmp/$forum_galeri->id_kategori_galeri/$forum_galeri->foto");
            }
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // check $path
            if (!File::exists("$path/$request->id_kategori_galeri")) {
                File::makeDirectory("$path/$request->id_kategori_galeri", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");
            $image_tmp = Image::make($request->file('foto'));
            $image_tmp->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // check $path
            if (!File::exists("$path_tmp/$request->id_kategori_galeri")) {
                File::makeDirectory("$path_tmp/$request->id_kategori_galeri", $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$request->id_kategori_galeri/$file_name");
        } else {
            $file_name = $forum_galeri->foto;
        }

        $forum_galeri->id_kategori_galeri = $request->id_kategori_galeri;
        $forum_galeri->thumbnail = $file_name;
        $forum_galeri->foto = $file_name;
        $forum_galeri->judul = $request->judul;
        $forum_galeri->isi = $request->isi;
        $forum_galeri->save();

        return redirect()->route('forum-galeri.index')
            ->with('success', 'ForumGaleri Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumGaleri  $forum_galeri

     */
    public function destroy(ForumGaleri $forum_galeri)
    {
        $path = storage_path("app/public/img/forum_galeri/$forum_galeri->id_kategori_galeri");
        $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$forum_galeri->id_kategori_galeri");
        if (File::exists("$path/$forum_galeri->foto")) {
            File::delete("$path/$forum_galeri->foto");
        }
        if (File::exists("$path_tmp/$forum_galeri->foto")) {
            File::delete("$path_tmp/$forum_galeri->foto");
        }
        $forum_galeri->delete();

        return redirect()->route('forum-galeri.index')
            ->with('success', 'ForumGaleri Berhasil Dihapus');
    }
}
