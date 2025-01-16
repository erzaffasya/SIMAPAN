<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;


class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        $lKantor = Kantor::all();
        return view('admin.kegiatan.tambah', compact('lKantor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $request->validate([
            "kantor_id" => 'required',
            "judul" => 'required',
            "foto" => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->foto != null) {
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // check $path
            $path = storage_path("app/public/img/kegiatan/$request->kantor_id/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save($path . $file_name, 80);
        } else {
            $file_name = null;
        }

        Kegiatan::create([
            "kantor_id" => $request->kantor_id,
            "judul" => $request->judul,
            "slug" => Str::slug($request->judul),
            "foto" => $file_name,
            "isi" => $request->isi,
        ]);

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan

     */
    public function show(Kegiatan $kegiatan) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan

     */
    public function edit(Kegiatan $kegiatan)
    {
        $lKantor = Kantor::all();
        return view('admin.kegiatan.ubah', compact('lKantor', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan

     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            "kantor_id" => 'required',
            "judul" => 'required',
            "foto" => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->foto) {
            $path = storage_path("app/public/img/kegiatan");
            if (File::exists("$path/$kegiatan->foto")) {
                File::delete("$path/$kegiatan->foto");
            }
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // check $path
            $path = storage_path("app/public/img/kegiatan/$request->kantor_id/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save("$path/$file_name", 80);
        } else {
            $file_name = $kegiatan->foto;
        }

        $kegiatan->kantor_id = $request->kantor_id;
        $kegiatan->judul = $request->judul;
        $kegiatan->slug = Str::slug($request->judul);
        $kegiatan->foto = $file_name;
        $kegiatan->isi = $request->isi;
        $kegiatan->save();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan

     */
    public function destroy(Kegiatan $kegiatan)
    {
        $path = storage_path("app/public/img/kegiatan/$kegiatan->kantor_id");
        if (File::exists("$path/$kegiatan->foto")) {
            File::delete("$path/$kegiatan->foto");
        }
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan Berhasil Dihapus');
    }
}
