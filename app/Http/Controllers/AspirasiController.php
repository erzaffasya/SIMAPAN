<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AspirasiController extends Controller
{
    /**
      * Display a listing of the resource.
      *

      */
    public function index()
    {
        $aspirasi = Aspirasi::all();
        return view('admin.aspirasi.index', compact('aspirasi'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('admin.aspirasi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {

        $request->validate([
            "nama" => 'required',
            "email" => 'required',
            "aspirasi" => 'required',
            'captcha' => ['required', 'captcha'],
        ]);

        Aspirasi::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "aspirasi" => $request->aspirasi,
        ]);

        return back()
            ->with('success', 'Aspirasi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aspirasi  $aspirasi

     */
    public function show(Aspirasi $aspirasi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aspirasi  $aspirasi

     */
    public function edit(Aspirasi $aspirasi)
    {
        return view('admin.aspirasi.ubah', compact('aspirasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aspirasi  $aspirasi

     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            "nama" => 'required',
            "email" => 'required',
            "aspirasi" => 'required',
        ]);

        $aspirasi->nama = $request->nama;
        $aspirasi->email = $request->email;
        $aspirasi->aspirasi = $request->aspirasi;
        $aspirasi->save();

        return redirect()->route('aspirasi.index')
            ->with('success', 'Aspirasi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aspirasi  $aspirasi

     */
    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();

        return redirect()->route('aspirasi.index')
            ->with('success', 'Aspirasi Berhasil Dihapus');
    }
}