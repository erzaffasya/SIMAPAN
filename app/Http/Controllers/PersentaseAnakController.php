<?php

namespace App\Http\Controllers;

use App\Models\PersentaseAnak;
use Illuminate\Http\Request;

class PersentaseAnakController extends Controller
{

    public function index()
    {
        $persentase_anak = PersentaseAnak::all();
        return view('admin.persentase_anak.index', compact('persentase_anak'));
    }

    public function create()
    {
        return view('admin.persentase_anak.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            "tahun" => "required|unique:persentase_anak",
            "akta_kelahiran" => "required",
            "kartu_identitas" => "required",
        ]);

        PersentaseAnak::create([
            'tahun' => $request->tahun,
            'akta_kelahiran' => $request->akta_kelahiran,
            'kartu_identitas' => $request->kartu_identitas,
        ]);
        return redirect()->route('persentase-anak.index')
            ->with('success', 'Persentase Anak Berhasil Ditambahkan');
    }

    public function show(PersentaseAnak $persentase_anak)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersentaseAnak  $persentase_anak
     */
    public function edit(PersentaseAnak $persentase_anak)
    {

        return view('admin.persentase_anak.ubah', compact('persentase_anak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersentaseAnak  $persentase_anak
     */
    public function update(Request $request, PersentaseAnak $persentase_anak)
    {
        $request->validate([
            "tahun" => "required",
            "akta_kelahiran" => "required",
            "kartu_identitas" => "required",
        ]);

        $persentase_anak->tahun = $request->tahun;
        $persentase_anak->akta_kelahiran = $request->akta_kelahiran;
        $persentase_anak->kartu_identitas = $request->kartu_identitas;
        $persentase_anak->save();

        return redirect()->route('persentase-anak.index')->with('success', 'Persentase Anak Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersentaseAnak  $persentase_anak
     */
    public function destroy(PersentaseAnak $persentase_anak)
    {
        $persentase_anak->delete();
        return redirect()->route('persentase-anak.index')->with('success', 'Persentase Anak Tidak Dapat Di HAPUS');
    }
}
