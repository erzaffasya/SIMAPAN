<?php

namespace App\Http\Controllers;

use App\Models\Siga;
use App\Models\SigaJenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Str;

class SigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $siga = Siga::all();
        return view('admin.siga.index', compact('siga'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        $SigaJenis = SigaJenis::all();
        return view('admin.siga.tambah', compact('SigaJenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $request->validate([
            "judul" => 'required',
            "file" => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->file != null) {
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $path = storage_path("app/public/siga/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $request->file->storeAs('public/siga/', $file_name);
        } else {
            $file_name = null;
        }

        Siga::create([
            "siga_jenis_id" => $request->siga_jenis_id,
            "judul" => $request->judul,
            "file" => $file_name,
            "deskripsi" => $request->deskripsi,
        ]);

        return redirect()->route('siga.index')
            ->with('success', 'Siga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siga  $siga

     */
    public function show(Siga $siga) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siga  $siga

     */
    public function edit(Siga $siga)
    {
        $SigaJenis = SigaJenis::all();
        return view('admin.siga.ubah', compact('SigaJenis', 'siga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siga  $siga

     */
    public function update(Request $request, Siga $siga)
    {
        $request->validate([
            "siga_jenis_id" => 'required',
            "judul" => 'required',
            "file" => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->file) {
            $path = storage_path("app/public/siga");
            if (File::exists("$path/$siga->file")) {
                File::delete("$path/$siga->file");
            }
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $path = storage_path("app/public/siga/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $request->file->storeAs('public/siga/', $file_name);
        } else {
            $file_name = $siga->file;
        }

        $siga->siga_jenis_id = $request->siga_jenis_id;
        $siga->judul = $request->judul;
        $siga->file = $file_name;
        $siga->deskripsi = $request->deskripsi;
        $siga->save();

        return redirect()->route('siga.index')
            ->with('success', 'Siga Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siga  $siga

     */
    public function destroy(Siga $siga)
    {
        $path = storage_path("app/public/siga/");
        if (File::exists("$path/$siga->file")) {
            File::delete("$path/$siga->file");
        }
        $siga->delete();

        return redirect()->route('siga.index')
            ->with('success', 'Siga Berhasil Dihapus');
    }
}
