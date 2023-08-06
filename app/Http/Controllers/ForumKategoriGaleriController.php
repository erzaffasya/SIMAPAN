<?php

namespace App\Http\Controllers;

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

        if ($request->foto) {
            $path = storage_path("app/public/img/forum_kategori_galeri");
            $path_tmp = storage_path("app/public/img/.thumbnail/forum_kategori_galeri");
            if ($request->foto != null) {
                if (File::exists("$path/$request->foto")) {
                    File::delete("$path/$request->foto");
                }
                if (File::exists("$path_tmp/$request->foto")) {
                    File::delete("$path_tmp/$request->foto");
                }
            }

            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = Image::make($request->file('foto'));
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists("$path")) {
                File::makeDirectory("$path", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");
            $image_tmp = Image::make($request->file('foto'));
            $image_tmp->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::exists("$path_tmp")) {
                File::makeDirectory("$path_tmp", $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$file_name");
        } else {
            $file_name = $request->foto;
        }

        ForumKategoriGaleri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            "slug" => Str::slug($request->judul),
            "foto" => $file_name,
            "thumbnail" => $file_name,
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

        if ($request->foto) {
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

            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = Image::make($request->file('foto'));
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists("$path")) {
                File::makeDirectory("$path", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");
            $image_tmp = Image::make($request->file('foto'));
            $image_tmp->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::exists("$path_tmp")) {
                File::makeDirectory("$path_tmp", $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$file_name");
        } else {
            $file_name = $forum_kategori_galeri->foto;
        }

        $forum_kategori_galeri->judul = $request->judul;
        $forum_kategori_galeri->slug = Str::slug($request->judul);
        $forum_kategori_galeri->deskripsi = $request->deskripsi;
        $forum_kategori_galeri->thumbnail = $file_name;
        $forum_kategori_galeri->foto = $file_name;
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