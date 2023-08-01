<?php

namespace App\Http\Controllers;

use App\Models\ProfilGaleri;
use App\Models\ProfilKategoriGaleri;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProfilGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $profil_galeri = ProfilGaleri::all();
        return view('admin.profil.galeri.index', compact('profil_galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        $lKategori = ProfilKategoriGaleri::all();
        return view('admin.profil.galeri.tambah', compact('lKategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $request->validate([
            "id_kategori_galeri" => 'required',
            "judul" => 'required',
            "foto" => 'required',
        ]);

        if ($request->foto != null) {
            $path = storage_path("app/public/img/profil_galeri/$request->id_kategori_galeri/");
            $path_tmp = storage_path("app/public/img/.thumbnail/profil_galeri/$request->id_kategori_galeri/");
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // check $path
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");

            $image_tmp = Image::make($request->file('foto'));
            $image_tmp->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists($path_tmp)) {
                File::makeDirectory($path_tmp, $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$file_name");
        } else {
            $file_name = null;
        }

        ProfilGaleri::create([
            "id_kategori_galeri" => $request->id_kategori_galeri,
            "thumbnail" => $file_name,
            "foto" => $file_name,
            "judul" => $request->judul,
            "deskripsi" => $request->deskripsi,
        ]);

        return redirect()->route('profil-galeri.index')
            ->with('success', 'ProfilGaleri Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilGaleri  $profil_galeri

     */
    public function show(ProfilGaleri $profil_galeri)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilGaleri  $profil_galeri

     */
    public function edit(ProfilGaleri $profil_galeri)
    {
        $lKategori = ProfilKategoriGaleri::all();
        return view('admin.profil.galeri.ubah', compact('lKategori', 'profil_galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilGaleri  $profil_galeri

     */
    public function update(Request $request, ProfilGaleri $profil_galeri)
    {
        $request->validate([
            "id_kategori_galeri" => 'required',
            "judul" => 'required',
            "foto" => 'nullable|image',
        ]);

        if ($request->foto) {
            $path = storage_path("app/public/img/profil_galeri");
            $path_tmp = storage_path("app/public/img/.thumbnail/profil_galeri");
            if (File::exists("$path/$profil_galeri->id_kategori_galeri/$profil_galeri->foto")) {
                File::delete("$path/$profil_galeri->id_kategori_galeri/$profil_galeri->foto");
            }
            if (File::exists("$path_tmp/$profil_galeri->id_kategori_galeri/$profil_galeri->foto")) {
                File::delete("$path_tmp/$profil_galeri->id_kategori_galeri/$profil_galeri->foto");
            }
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // check $path
            if (!File::exists("$path/$request->id_kategori_galeri")) {
                File::makeDirectory("$path/$request->id_kategori_galeri", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");
            $image_tmp = Image::make($request->file('foto'));
            $image_tmp->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // check $path
            if (!File::exists("$path_tmp/$request->id_kategori_galeri")) {
                File::makeDirectory("$path_tmp/$request->id_kategori_galeri", $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$request->id_kategori_galeri/$file_name");
        } else {
            $file_name = $profil_galeri->foto;
        }

        $profil_galeri->id_kategori_galeri = $request->id_kategori_galeri;
        $profil_galeri->thumbnail = $file_name;
        $profil_galeri->judul = $request->judul;
        $profil_galeri->foto = $file_name;
        $profil_galeri->deskripsi = $request->deskripsi;
        $profil_galeri->save();

        return redirect()->route('profil-galeri.index')
            ->with('success', 'ProfilGaleri Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilGaleri  $profil_galeri

     */
    public function destroy(ProfilGaleri $profil_galeri)
    {
        $path = storage_path("app/public/img/profil_galeri/$profil_galeri->id_kategori_galeri");
        $path_tmp = storage_path("app/public/img/.thumbnail/profil_galeri/$profil_galeri->id_kategori_galeri");
        if (File::exists("$path/$profil_galeri->foto")) {
            File::delete("$path/$profil_galeri->foto");
        }
        if (File::exists("$path_tmp/$profil_galeri->foto")) {
            File::delete("$path_tmp/$profil_galeri->foto");
        }
        $profil_galeri->delete();

        return redirect()->route('profil-galeri.index')
            ->with('success', 'ProfilGaleri Berhasil Dihapus');
    }
}