<?php

namespace App\Http\Controllers;

use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

class Kluster5Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $kluster5 = ForumKategoriGaleri::where("kategori", "5")->limit(4)->get();
        return view('admin.kluster5.index', compact("kluster5"));
    }

    public function edit(ForumKategoriGaleri $kluster5)
    {
        return view('admin.kluster5.ubah', compact("kluster5"));
    }

    public function update(Request $request, ForumKategoriGaleri $kluster5)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->foto) {
            foreach ($request->foto as $key => $foto) {
                $path = storage_path("app/public/img/forum_galeri/$kluster5->id");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$kluster5->id");
                if ($request->foto != null) {
                    if (File::exists("$path/$kluster5->foto")) {
                        File::delete("$path/$kluster5->foto");
                    }
                    if (File::exists("$path_tmp/$kluster5->foto")) {
                        File::delete("$path_tmp/$kluster5->foto");
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
                    "id_kategori_galeri" => $kluster5->id,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => "-",
                    "isi" => "-",
                ]);
            }
        }
        $kluster5->judul = $request->judul;
        $kluster5->slug = Str::slug($request->judul);
        $kluster5->deskripsi = $request->deskripsi;
        $kluster5->save();

        return redirect()->route('kluster5.index')->with('success', 'Kluster 2 Berhasil Diubah');
    }
}