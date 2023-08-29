<?php

namespace App\Http\Controllers;

use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

class Kluster3Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $kluster3 = ForumKategoriGaleri::where("kategori", "3")->limit(3)->get();
        return view('admin.kluster3.index', compact("kluster3"));
    }

    public function edit(ForumKategoriGaleri $kluster3)
    {
        return view('admin.kluster3.ubah', compact("kluster3"));
    }

    public function update(Request $request, ForumKategoriGaleri $kluster3)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->foto) {
            foreach ($request->foto as $key => $foto) {
                $path = storage_path("app/public/img/forum_galeri/$kluster3->id");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$kluster3->id");
                if ($request->foto != null) {
                    if (File::exists("$path/$kluster3->foto")) {
                        File::delete("$path/$kluster3->foto");
                    }
                    if (File::exists("$path_tmp/$kluster3->foto")) {
                        File::delete("$path_tmp/$kluster3->foto");
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
                    "id_kategori_galeri" => $kluster3->id,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => "-",
                    "isi" => "-",
                ]);
            }
        }
        $kluster3->judul = $request->judul;
        $kluster3->slug = Str::slug($request->judul);
        $kluster3->deskripsi = $request->deskripsi;
        $kluster3->save();

        return redirect()->route('kluster3.index')->with('success', 'Kluster 2 Berhasil Diubah');
    }
}