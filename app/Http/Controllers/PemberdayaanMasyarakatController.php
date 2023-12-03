<?php

namespace App\Http\Controllers;

use App\Models\PemberdayaanMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PemberdayaanMasyarakatController extends Controller
{
  /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $pemberdayaanMasyarakat = PemberdayaanMasyarakat::all();
        return view('admin.pemberdayaan_masyarakat.index', compact('pemberdayaanMasyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('admin.pemberdayaan_masyarakat.tambah');
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
            "file" => 'required',
        ]);

        if ($request->file != null) {
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $path = storage_path("app/public/pemberdayaan-masyarakat/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $request->file->storeAs('public/pemberdayaan-masyarakat/', $file_name);
        } else {
            $file_name = null;
        }

        PemberdayaanMasyarakat::create([
            "judul" => $request->judul,
            "file" => $file_name,
            "deskripsi" => $request->deskripsi,
            "link" => $request->link,
        ]);

        return redirect()->route('pemberdayaan-masyarakat.index')
            ->with('success', 'PemberdayaanMasyarakat Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemberdayaanMasyarakat  $pemberdayaanMasyarakat

     */
    public function show(PemberdayaanMasyarakat $pemberdayaanMasyarakat)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemberdayaanMasyarakat  $pemberdayaanMasyarakat

     */
    public function edit(PemberdayaanMasyarakat $pemberdayaanMasyarakat)
    {
        return view('admin.pemberdayaan_masyarakat.ubah', compact('pemberdayaanMasyarakat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PemberdayaanMasyarakat  $pemberdayaanMasyarakat

     */
    public function update(Request $request, PemberdayaanMasyarakat $pemberdayaanMasyarakat)
    {
        $request->validate([
            "judul" => 'required',
            "file" => 'nullable|image',
        ]);

        if ($request->file) {
            $path = storage_path("app/public/pemberdayaan-masyarakat");
            if (File::exists("$path/$pemberdayaanMasyarakat->file")) {
                File::delete("$path/$pemberdayaanMasyarakat->file");
            }
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $path = storage_path("app/public/pemberdayaan-masyarakat/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $request->file->storeAs('public/pemberdayaan-masyarakat/', $file_name);
        } else {
            $file_name = $pemberdayaanMasyarakat->file;
        }

        $pemberdayaanMasyarakat->judul = $request->judul;
        $pemberdayaanMasyarakat->file = $file_name;
        $pemberdayaanMasyarakat->deskripsi = $request->deskripsi;
        $pemberdayaanMasyarakat->link = $request->link;
        $pemberdayaanMasyarakat->save();

        return redirect()->route('pemberdayaan-masyarakat.index')
            ->with('success', 'PemberdayaanMasyarakat Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemberdayaanMasyarakat  $pemberdayaanMasyarakat

     */
    public function destroy(PemberdayaanMasyarakat $pemberdayaanMasyarakat)
    {
        $path = storage_path("app/public/pemberdayaan-masyarakat/");
        if (File::exists("$path/$pemberdayaanMasyarakat->file")) {
            File::delete("$path/$pemberdayaanMasyarakat->file");
        }
        $pemberdayaanMasyarakat->delete();

        return redirect()->route('pemberdayaan-masyarakat.index')
            ->with('success', 'PemberdayaanMasyarakat Berhasil Dihapus');
    }
}
