<?php

namespace App\Http\Controllers;

use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Str;

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
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);

        $kategori = ForumKategoriGaleri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            "slug" => Str::slug($request->judul),
        ]);

        foreach ($request->foto as $key => $foto) {
            if ($foto) {
                $path = storage_path("app/public/img/forum_kategori_galeri");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_kategori_galeri");
                if ($foto != null) {
                    if (File::exists("$path/$foto")) {
                        File::delete("$path/$foto");
                    }
                    if (File::exists("$path_tmp/$foto")) {
                        File::delete("$path_tmp/$foto");
                    }
                }

                $extention = $foto->extension();
                $file_name = time() . $key . '.' . $extention;
                $image = Image::make($foto);
                $image->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                if (!File::exists("$path")) {
                    File::makeDirectory("$path", $mode = 0777, true, true);
                }
                $image->save("$path/$file_name");
                $image_tmp = Image::make($foto);
                $image_tmp->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                if (!File::exists("$path_tmp")) {
                    File::makeDirectory("$path_tmp", $mode = 0777, true, true);
                }
                $image_tmp->save("$path_tmp/$file_name");

            } else {
                $file_name = null;
            }
            ForumGaleri::create([
                "id_kategori_galeri" => $kategori->id,
                "thumbnail" => $file_name,
                "foto" => $file_name,
                "judul" => "-",
                "isi" => "-",
            ]);
        }


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
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->foto) {
            foreach ($request->foto as $key => $foto) {
                $path = storage_path("app/public/img/forum_kategori_galeri");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_kategori_galeri");
                if ($request->foto != null) {
                    if (File::exists("$path/$forum_kategori_galeri->foto")) {
                        File::delete("$path/$forum_kategori_galeri->foto");
                    }
                    if (File::exists("$path_tmp/$forum_kategori_galeri->foto")) {
                        File::delete("$path_tmp/$forum_kategori_galeri->foto");
                    }
                }

                $extention = $foto->extension();
                $file_name = time() . $key . '.' . $extention;
                $image = Image::make($foto);
                $image->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                if (!File::exists("$path")) {
                    File::makeDirectory("$path", $mode = 0777, true, true);
                }
                $image->save("$path/$file_name");
                $image_tmp = Image::make($foto);
                $image_tmp->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                if (!File::exists("$path_tmp")) {
                    File::makeDirectory("$path_tmp", $mode = 0777, true, true);
                }
                $image_tmp->save("$path_tmp/$file_name");
                ForumGaleri::create([
                    "id_kategori_galeri" => $forum_kategori_galeri->id,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => "-",
                    "isi" => "-",
                ]);
            }
        }
        $forum_kategori_galeri->judul = $request->judul;
        $forum_kategori_galeri->slug = Str::slug($request->judul);
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