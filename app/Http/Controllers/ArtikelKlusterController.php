<?php

namespace App\Http\Controllers;

use App\Models\ArtikelKluster;
use App\Models\ArtikelKlusterDetail;
use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use App\Models\Kluster;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

class ArtikelKlusterController extends Controller
{

    public function create(Kluster $kluster)
    {
        return view('admin.kluster.tambah', compact("kluster"));
    }

    public function edit(Kluster $kluster, ArtikelKluster $artikel)
    {
        return view('admin.kluster.ubah', compact("kluster", "artikel"));
    }

    public function store(Request $request, Kluster $kluster)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'jenis' => 'required',
        ]);

        $artikelkluster = ArtikelKluster::create([
            "urut" => 1,
            "kluster_id" => $kluster->id,
            "title" => $request->title,
            "subtitle" => $request->subtitle,
            "description" => $request->description,
        ]);

        if ($request->detail_foto) {
            foreach ($request->detail_foto as $key => $foto) {
                $path = storage_path("app/public/img/artikel_kluster/$kluster->kluster");
                $path_tmp = storage_path("app/public/img/.thumbnail/artikel_kluster/$kluster->kluster");
                if ($request->detail_foto != null) {
                    if (File::exists("$path/$kluster->foto")) {
                        File::delete("$path/$kluster->foto");
                    }
                    if (File::exists("$path_tmp/$kluster->foto")) {
                        File::delete("$path_tmp/$kluster->foto");
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
                ArtikelKlusterDetail::create([
                    "artikel_kluster_id" => $artikelkluster->id,
                    "foto" => $file_name,
                    "title" => "-",
                    "subtitle" => "-",
                ]);
            }
        }


        return redirect()->route('kluster.edit', $kluster->kluster)->with('success', "Kluster $kluster->kluster Berhasil Diubah");
    }


    // UPDATE BELUM SELESAI

    public function update(Request $request, Kluster $kluster)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->foto) {
            foreach ($request->foto as $key => $foto) {
                $path = storage_path("app/public/img/forum_galeri/$kluster->kluster");
                $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$kluster->kluster");
                if ($request->foto != null) {
                    if (File::exists("$path/$kluster->foto")) {
                        File::delete("$path/$kluster->foto");
                    }
                    if (File::exists("$path_tmp/$kluster->foto")) {
                        File::delete("$path_tmp/$kluster->foto");
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
                ArtikelKlusterDetail::create([
                    "id_kategori_galeri" => $kluster->id,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => "-",
                    "isi" => "-",
                ]);
            }
        }
        $kluster->judul = $request->judul;
        $kluster->slug = Str::slug($request->judul);
        $kluster->deskripsi = $request->deskripsi;
        $kluster->save();

        return redirect()->route('kluster.index')->with('success', 'Kluster 1 Berhasil Diubah');
    }

    function destroy(Kluster $kluster, ArtikelKluster $artikel)
    {
        $artikel->detail()->delete();
        $artikel->delete();
        // $path = storage_path("app/public/img/artikel_kluster/{$artikel_kluster_detail->artikel->kluster->kluster}/$artikel_kluster_detail->id_kategori_galeri");
        // $path_tmp = storage_path("app/public/img/.thumbnail/artikel_kluster/{$artikel_kluster_detail->artikel->kluster->kluster}/$artikel_kluster_detail->id_kategori_galeri");
        // if (File::exists("$path/$artikel_kluster_detail->foto")) {
        //     File::delete("$path/$artikel_kluster_detail->foto");
        // }
        // if (File::exists("$path_tmp/$artikel_kluster_detail->foto")) {
        //     File::delete("$path_tmp/$artikel_kluster_detail->foto");
        // }
        // $artikel_kluster_detail->delete();
        return redirect()->back()->with('success', "Kluster {$kluster->kluster} Berhasil Diubah");
    }
}