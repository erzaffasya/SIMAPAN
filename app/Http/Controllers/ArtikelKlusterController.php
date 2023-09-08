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
            "jenis" => $request->jenis,
            "description" => $request->description,
        ]);

        switch ($request->jenis) {
            case 'A':
                if ($request->detail_a_foto) {
                    foreach ($request->detail_a_foto as $key => $foto) {
                        $path = storage_path("app/public/img/artikel_kluster/$kluster->kluster");
                        $path_tmp = storage_path("app/public/img/.thumbnail/artikel_kluster/$kluster->kluster");

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
                            "title" => '-',
                            "subtitle" => '-',
                            "description" => '-',
                        ]);
                    }
                }
                break;

            case 'B':

                for ($key = 0; $key < 3; $key++) {
                    if ($foto = $request->detail_b_foto[$key]) {
                        $path = storage_path("app/public/img/artikel_kluster/$kluster->kluster");
                        $path_tmp = storage_path("app/public/img/.thumbnail/artikel_kluster/$kluster->kluster");

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

                    }
                    ArtikelKlusterDetail::create([
                        "artikel_kluster_id" => $artikelkluster->id,
                        "foto" => $file_name,
                        "title" => $request->detail_b_title[$key] ?? '-',
                        "subtitle" => $request->detail_b_subtitle[$key] ?? '-',
                        "description" => '-',
                    ]);
                }
                break;

            case 'C':
                foreach ($request->detail_c_title as $key => $title) {
                    ArtikelKlusterDetail::create([
                        "artikel_kluster_id" => $artikelkluster->id,
                        "foto" => '-',
                        "title" => $request->detail_c_title[$key] ?? '-',
                        "subtitle" => '-',
                        "description" => $request->detail_c_description[$key] ?? '-',
                    ]);
                }

                break;
            default:
                # code...
                break;
        }



        return redirect()->route('kluster.edit', $kluster->kluster)->with('success', "Kluster $kluster->kluster Berhasil Tambah");
    }


    // UPDATE BELUM SELESAI

    public function update(Request $request, Kluster $kluster, ArtikelKluster $artikel)
    {
        $request->validate([
            'jenis' => 'required',
            'subtitle' => 'nullable',
            'description' => 'nullable',
        ]);

        switch ($request->jenis) {
            case 'A':
                if ($request->detail_a_foto) {
                    $file_name = null;
                    foreach ($request->detail_a_foto as $key => $foto) {
                        $path = storage_path("app/public/img/artikel_kluster/$kluster->kluster");
                        $path_tmp = storage_path("app/public/img/.thumbnail/artikel_kluster/$kluster->kluster");
                        if ($request->detail_a_foto != null) {
                            if (File::exists("$path/{$artikel->detail[$key]->foto}")) {
                                File::delete("$path/{$artikel->detail[$key]->foto}");
                            }
                            if (File::exists("$path_tmp/{$artikel->detail[$key]->foto}")) {
                                File::delete("$path_tmp/{$artikel->detail[$key]->foto}");
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
                    }
                    ArtikelKlusterDetail::create([
                        "artikel_kluster_id" => $kluster->id,
                        "foto" => $file_name,
                        "title" => '-',
                        "subtitle" => '-',
                        "description" => '-',
                    ]);
                }
                break;

            case 'B':
                for ($key = 0; $key < 3; $key++) {
                    $file_name = "";
                    if ($foto = $request->detail_b_foto[$key]) {
                        $path = storage_path("app/public/img/artikel_kluster/$kluster->kluster");
                        $path_tmp = storage_path("app/public/img/.thumbnail/artikel_kluster/$kluster->kluster");
                        if ($request->detail_b_foto != null) {
                            if (File::exists("$path/{$artikel->detail[$key]->foto}")) {
                                File::delete("$path/{$artikel->detail[$key]->foto}");
                            }
                            if (File::exists("$path_tmp/{$artikel->detail[$key]->foto}")) {
                                File::delete("$path_tmp/{$artikel->detail[$key]->foto}");
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
                    }
                    if ($artikel->jenis != $request->jenis) {
                        $artikel->detail()->delete();
                        ArtikelKlusterDetail::create([
                            "artikel_kluster_id" => $kluster->id,
                            "foto" => $file_name,
                            "title" => $request->detail_b_title[$key] ?? '-',
                            "subtitle" => $request->detail_b_subtitle[$key] ?? '-',
                            "description" => '-',
                        ]);
                    } else {
                        $file_name = $request->detail_b_foto[$key] == null ? $artikel->detail[$key]->foto : $file_name;
                        $artikel->detail[$key]->foto = $file_name;
                        $artikel->detail[$key]->title = $request->detail_b_title[$key] ?? '-';
                        $artikel->detail[$key]->subtitle = $request->detail_b_subtitle[$key] ?? '-';
                        $artikel->detail[$key]->save();
                    }

                }
                break;

            case 'C':
                $artikel->detail()->delete();
                foreach ($request->detail_c_title as $key => $title) {
                    ArtikelKlusterDetail::create([
                        "artikel_kluster_id" => $artikel->id,
                        "foto" => '-',
                        "title" => $request->detail_c_title[$key] ?? '-',
                        "subtitle" => '-',
                        "description" => $request->detail_c_description[$key] ?? '-',
                    ]);
                }

                break;
            default:
                # code...
                break;
        }

        $artikel->title = $request->title;
        $artikel->jenis = $request->jenis;
        $artikel->subtitle = $request->subtitle;
        $artikel->description = $request->description;
        $artikel->save();

        return redirect()->route('kluster.edit', $kluster->kluster)->with('success', "Kluster $kluster->kluster Berhasil Di Ubah");
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