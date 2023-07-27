<?php

namespace App\Http\Controllers;

use App\Models\JumlahAnak;
use Illuminate\Http\Request;

class JumlahAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tentang = JumlahAnak::find(1);
        return view('admin.jumlahanak.index', compact('tentang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'perempuan' => 'required|numeric',
            'laki_laki' => 'required|numeric',
        ]);

        $tentang = JumlahAnak::firstOrCreate(
            [
                'id' => 1
            ],
            [
                "perempuan" => $request->perempuan,
                "laki-laki" => $request->laki_laki,
            ]
        );
        $tentang->perempuan = $request->perempuan;
        $tentang->{'laki-laki'} = $request->laki_laki;
        $tentang->save();

        return redirect()->route('jumlahanak.index')->with('success', 'Berhasil update jumlah anak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JumlahAnak  $jumlahAnak
     */
    public function show(JumlahAnak $jumlahAnak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JumlahAnak  $jumlahAnak
     */
    public function edit(JumlahAnak $jumlahAnak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JumlahAnak  $jumlahAnak
     */
    public function update(Request $request, JumlahAnak $jumlahAnak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JumlahAnak  $jumlahAnak
     */
    public function destroy(JumlahAnak $jumlahAnak)
    {
        //
    }
}