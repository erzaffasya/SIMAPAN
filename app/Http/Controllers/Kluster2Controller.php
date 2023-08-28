<?php

namespace App\Http\Controllers;

use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

class Kluster2Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $kluster2 = ForumKategoriGaleri::where("kategori", "2")->limit(3)->get();
        return view('admin.kluster2.index', compact("kluster2"));
    }

    public function edit(ForumKategoriGaleri $kluster2)
    {
        return view('admin.kluster2.ubah', compact("kluster2"));
    }

    public function update(Request $request, ForumKategoriGaleri $kluster2)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->foto) {
            foreach ($request->foto as $key => $foto) {
                $path = storage_path("app/public/img/forum_galeri/$kluster2->id");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$kluster2->id");
                if ($request->foto != null) {
                    if (File::exists("$path/$kluster2->foto")) {
                        File::delete("$path/$kluster2->foto");
                    }
                    if (File::exists("$path_tmp/$kluster2->foto")) {
                        File::delete("$path_tmp/$kluster2->foto");
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
                    "id_kategori_galeri" => $kluster2->id,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => "-",
                    "isi" => "-",
                ]);
            }
        }
        $kluster2->judul = $request->judul;
        $kluster2->slug = Str::slug($request->judul);
        $kluster2->deskripsi = $request->deskripsi;
        $kluster2->save();

        return redirect()->route('kluster2.index')->with('success', 'Kluster 2 Berhasil Diubah');
    }
}