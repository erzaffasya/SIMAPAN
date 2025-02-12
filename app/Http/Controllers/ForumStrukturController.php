<?php

namespace App\Http\Controllers;

use App\Models\ForumStruktur;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ForumStrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $struktur = ForumStruktur::find(1);
        return view('admin.forum.struktur.index', compact('struktur'));
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
            'deskripsi' => 'required',
        ]);

        $struktur = ForumStruktur::find(1);

        if (!$struktur) {
            $request->validate([
                'foto' => 'required|mimes:jpeg,png,jpg,gif',
            ]);
        }

        if ($request->foto) {
            $path = storage_path("app/public/img/struktur");
            $path_tmp = storage_path("app/public/img/.thumbnail/struktur");
            if ($struktur) {
                if (File::exists("$path/$struktur->foto")) {
                    File::delete("$path/$struktur->foto");
                }
                if (File::exists("$path_tmp/$struktur->foto")) {
                    File::delete("$path_tmp/$struktur->foto");
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
            $file_name = $struktur->foto;
        }

        $struktur = ForumStruktur::firstOrCreate(
            [
                'id' => 1
            ],
            [
                "deskripsi" => $request->deskripsi,
                "foto" => $file_name,
            ]
        );
        $struktur->id = 1;
        $struktur->deskripsi = $request->deskripsi;
        $struktur->foto = $file_name;
        $struktur->save();

        return redirect()->route('forum-struktur.index')->with('success', 'Berhasil update tentang');
    }
}
