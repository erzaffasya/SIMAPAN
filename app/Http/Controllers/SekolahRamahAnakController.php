<?php

namespace App\Http\Controllers;

use App\Models\SekolahRamahAnak;
use Illuminate\Http\Request;

class SekolahRamahAnakController extends Controller
{
    public function index()
    {
        $sekolah_ramah_anak = SekolahRamahAnak::all();
        return view('admin.sekolah_ramah_anak.index', compact('sekolah_ramah_anak'));
    }

    public function create()
    {
        return view('admin.sekolah_ramah_anak.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            "tahun" => "required|unique:sekolah_ramah_anak",
            "paud" => "required",
            "sd" => "required",
            "smp" => "required",
            "slta" => "required",
            "slb" => "required",
        ]);

        $isaktif = $request->isaktif ? true : false;

        SekolahRamahAnak::create([
            'tahun' => $request->tahun,
            'paud' => $request->paud,
            'sd' => $request->sd,
            'smp' => $request->smp,
            'slta' => $request->slta,
            'slb' => $request->slb,
            'isaktif' => $isaktif,
        ]);
        return redirect()->route('sekolah-ramah-anak.index')
            ->with('success', 'Sekolah Ramah Anak Berhasil Ditambahkan');
    }

    public function show(SekolahRamahAnak $sekolah_ramah_anak)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SekolahRamahAnak  $sekolah_ramah_anak
     */
    public function edit(SekolahRamahAnak $sekolah_ramah_anak)
    {

        return view('admin.sekolah_ramah_anak.ubah', compact('sekolah_ramah_anak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SekolahRamahAnak  $sekolah_ramah_anak
     */
    public function update(Request $request, SekolahRamahAnak $sekolah_ramah_anak)
    {
        $request->validate([
            "tahun" => "required",
            "paud" => "required",
            "sd" => "required",
            "smp" => "required",
            "slta" => "required",
            "slb" => "required",
        ]);

        $isaktif = $request->isaktif ? true : false;

        $sekolah_ramah_anak->tahun = $request->tahun;
        $sekolah_ramah_anak->paud = $request->paud;
        $sekolah_ramah_anak->sd = $request->sd;
        $sekolah_ramah_anak->smp = $request->smp;
        $sekolah_ramah_anak->slta = $request->slta;
        $sekolah_ramah_anak->slb = $request->slb;
        $sekolah_ramah_anak->isaktif = $isaktif;
        $sekolah_ramah_anak->save();

        return redirect()->route('sekolah-ramah-anak.index')->with('success', 'Sekolah Ramah Anak Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SekolahRamahAnak  $sekolah_ramah_anak
     */
    public function destroy(SekolahRamahAnak $sekolah_ramah_anak)
    {
        $sekolah_ramah_anak->delete();
        return redirect()->route('sekolah-ramah-anak.index')->with('success', 'Sekolah Ramah Anak Tidak Dapat Di HAPUS');
    }
}