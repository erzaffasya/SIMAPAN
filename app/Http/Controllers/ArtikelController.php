<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $lKategori = KategoriArtikel::all();
        return view('admin.artikel.tambah', compact('lKategori'));

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
            $path = storage_path("app/public/img/artikel/$request->id_kategori");
            $path_tmp = storage_path("app/public/img/.thumbnail/artikel/$request->id_kategori");
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            // $image->resize(1080, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
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
            $image_tmp->save("$path_tmp/$file_name");
        } else {
            $file_name = null;
        }

        Artikel::create([
            "id_kategori" => $request->id_kategori,
            "slug" => Str::slug($request->title),
            "foto" => $file_name,
            "thumbnail" => $file_name,
            "judul" => $request->judul,
            "isi" => $request->isi
        ]);


        return redirect()->route('artikel.index')
            ->with('success', 'Artikel Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     */
    public function show(Artikel $artikel)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     */
    public function edit(Artikel $artikel)
    {
        $lKategori = KategoriArtikel::all();
        return view('admin.artikel.ubah', compact('lKategori', 'artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     */
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);


        if ($request->foto) {
            $path = storage_path("app/public/img/artikel");
            $path_tmp = storage_path("app/public/img/.thumbnail/artikel");
            if (File::exists("$path/$artikel->id_kategori/$artikel->foto")) {
                File::delete("$path/$artikel->id_kategori/$artikel->foto");
            }
            if (File::exists("$path_tmp/$artikel->id_kategori/$artikel->foto")) {
                File::delete("$path_tmp/$artikel->id_kategori/$artikel->foto");
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
            $file_name = $artikel->foto;
        }

        $artikel->id_kategori = $request->id_kategori;
        $artikel->judul = $request->judul;
        $artikel->slug = Str::slug($request->judul);
        $artikel->foto = $file_name;
        $artikel->thumbnail = $file_name;
        $artikel->isi = $request->isi;
        $artikel->save();

        return redirect()->route('artikel.index')
            ->with('success', 'Artikel Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     */
    public function destroy(Artikel $artikel)
    {
        $path = storage_path("app/public/img/artikel");
        $path_tmp = storage_path("app/public/img/.thumbnail/artikel");
        if (File::exists("$path/$artikel->id_kategori/$artikel->foto")) {
            File::delete("$path/$artikel->id_kategori/$artikel->foto");
        }
        if (File::exists("$path_tmp/$artikel->id_kategori/$artikel->foto")) {
            File::delete("$path_tmp/$artikel->id_kategori/$artikel->foto");
        }
        $artikel->delete();


        return redirect()->route('artikel.index')
            ->with('success', 'Artikel Berhasil Dihapus');
    }
}