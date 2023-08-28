<?php

namespace App\Http\Controllers;

use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

class Kluster1Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $kluster1 = ForumKategoriGaleri::where("kategori", "1")->limit(2)->get();
        return view('admin.kluster1.index', compact("kluster1"));
    }

    public function edit(ForumKategoriGaleri $kluster1)
    {
        return view('admin.kluster1.ubah', compact("kluster1"));
    }

    public function update(Request $request, ForumKategoriGaleri $kluster1)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->foto) {
            foreach ($request->foto as $key => $foto) {
                $path = storage_path("app/public/img/forum_galeri/$kluster1->id");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$kluster1->id");
                if ($request->foto != null) {
                    if (File::exists("$path/$kluster1->foto")) {
                        File::delete("$path/$kluster1->foto");
                    }
                    if (File::exists("$path_tmp/$kluster1->foto")) {
                        File::delete("$path_tmp/$kluster1->foto");
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
                    "id_kategori_galeri" => $kluster1->id,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => "-",
                    "isi" => "-",
                ]);
            }
        }
        $kluster1->judul = $request->judul;
        $kluster1->slug = Str::slug($request->judul);
        $kluster1->deskripsi = $request->deskripsi;
        $kluster1->kategori = "1";
        $kluster1->save();

        return redirect()->route('kluster1.index')->with('success', 'Kluster 1 Berhasil Diubah');
    }
}