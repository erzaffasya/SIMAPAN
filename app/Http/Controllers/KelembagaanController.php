<?php

namespace App\Http\Controllers;

use App\Models\Kelembagaan;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class KelembagaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $kelembagaan = Kelembagaan::find(1);
        return view('admin.profil.kelembagaan.index', compact('kelembagaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|mimes:jpeg,png,jpg,gif',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $kelembagaan = Kelembagaan::find(1);
        if (!$kelembagaan) {
            $request->validate([
                'foto' => 'required|mimes:jpeg,png,jpg,gif',
            ]);
        }

        if ($request->foto) {
            $path = storage_path("app/public/img/kelembagaan");
            $path_tmp = storage_path("app/public/img/.thumbnail/kelembagaan");
            if ($kelembagaan) {
                if (File::exists("$path/$kelembagaan->foto")) {
                    File::delete("$path/$kelembagaan->foto");
                }
                if (File::exists("$path_tmp/$kelembagaan->foto")) {
                    File::delete("$path_tmp/$kelembagaan->foto");
                }
            }

            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
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
            $file_name = $kelembagaan->foto;
        }

        $kelembagaan = Kelembagaan::firstOrCreate(
            [
                'id' => 1
            ],
            [
                "deskripsi" => $request->deskripsi,
                "judul" => $request->judul,
                "foto" => $file_name,
                "thumbnail" => $file_name,
            ]
        );
        $kelembagaan->id = 1;
        $kelembagaan->deskripsi = $request->deskripsi;
        $kelembagaan->judul = $request->judul;
        $kelembagaan->foto = $file_name;
        $kelembagaan->save();

        return redirect()->route('profil-kelembagaan.index')->with('success', 'Berhasil update tentang');
    }
}
