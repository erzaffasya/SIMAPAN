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
            "foto.*" => 'required|image|mimes:jpeg,png,jpg,gif', // Validate each uploaded image
        ]);

        $id_kategori_galeri = $request->id_kategori_galeri;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $index => $file) {
                $extention = $file->getClientOriginalExtension();
                $file_name = time() . "_$index" . '.' . $extention;
                $image = Image::make($file);
                $image->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $path = storage_path("app/public/img/profil_galeri/$id_kategori_galeri/");
                $path_tmp = storage_path("app/public/img/.thumbnail/profil_galeri/$id_kategori_galeri/");

                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $image->save("$path/$file_name");

                $image_tmp = Image::make($file);
                $image_tmp->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                if (!File::exists($path_tmp)) {
                    File::makeDirectory($path_tmp, $mode = 0777, true, true);
                }
                $image_tmp->save("$path_tmp/$file_name");

                ProfilGaleri::create([
                    "id_kategori_galeri" => $id_kategori_galeri,
                    "thumbnail" => $file_name,
                    "foto" => $file_name,
                    "judul" => $judul,
                    "deskripsi" => $deskripsi,
                ]);
            }
        }

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
            "foto.*" => 'nullable|image', // Validate each uploaded image
        ]);

        $id_kategori_galeri = $request->id_kategori_galeri;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $index => $file) {
                $extention = $file->getClientOriginalExtension();
                $file_name = time() . "_$index" . '.' . $extention;
                $image = Image::make($file);
                $image->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $path = storage_path("app/public/img/profil_galeri/$id_kategori_galeri/");
                $path_tmp = storage_path("app/public/img/.thumbnail/profil_galeri/$id_kategori_galeri/");

                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $image->save("$path/$file_name");

                $image_tmp = Image::make($file);
                $image_tmp->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                if (!File::exists($path_tmp)) {
                    File::makeDirectory($path_tmp, $mode = 0777, true, true);
                }
                $image_tmp->save("$path_tmp/$file_name");

                // Update the current ProfilGaleri entry
                $profil_galeri->update([
                    "id_kategori_galeri" => $id_kategori_galeri,
                    "thumbnail" => $file_name,
                    "judul" => $judul,
                    "foto" => $file_name,
                    "deskripsi" => $deskripsi,
                ]);
            }
        } else {
            // Update the current ProfilGaleri entry without changing the image
            $profil_galeri->update([
                "id_kategori_galeri" => $id_kategori_galeri,
                "judul" => $judul,
                "deskripsi" => $deskripsi,
            ]);
        }
        
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
