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
            "foto.*" => 'required|image|mimes:jpeg,png,jpg,gif', // Validate each uploaded image
        ]);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $index => $file) {
                $extention = $file->getClientOriginalExtension();
                $file_name = time() . "_$index" . '.' . $extention;
                $image = Image::make($file);
                $image->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $path = storage_path("app/public/img/forum_galeri/$request->id_kategori_galeri/");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$request->id_kategori_galeri/");

                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $image->save("$path/$file_name");

                $image_tmp = Image::make($file);
                $image_tmp->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                if (!File::exists($path_tmp)) {
                    File::makeDirectory($path_tmp, $mode = 0777, true, true);
                }
                $image_tmp->save("$path_tmp/$file_name");

                ForumGaleri::create([
                    "id_kategori_galeri" => $request->id_kategori_galeri,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => $request->judul,
                    "isi" => $request->isi,
                ]);
            }
        }

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
            "foto.*" => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validate each uploaded image
        ]);

        $id_kategori_galeri = $request->id_kategori_galeri;
        $judul = $request->judul;
        $isi = $request->isi;

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $index => $file) {
                $extention = $file->getClientOriginalExtension();
                $file_name = time() . "_$index" . '.' . $extention;
                $image = Image::make($file);
                $image->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $path = storage_path("app/public/img/forum_galeri/$id_kategori_galeri/");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$id_kategori_galeri/");

                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $image->save("$path/$file_name");

                $image_tmp = Image::make($file);
                $image_tmp->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                if (!File::exists($path_tmp)) {
                    File::makeDirectory($path_tmp, $mode = 0777, true, true);
                }
                $image_tmp->save("$path_tmp/$file_name");

                // Update the current ForumGaleri entry
                $forum_galeri->update([
                    "id_kategori_galeri" => $id_kategori_galeri,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => $judul,
                    "isi" => $isi,
                ]);
            }
        } else {
            // Update the current ForumGaleri entry without changing the image
            $forum_galeri->update([
                "id_kategori_galeri" => $id_kategori_galeri,
                "judul" => $judul,
                "isi" => $isi,
            ]);
        }

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
