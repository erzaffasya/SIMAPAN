<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tentang = Tentang::find(1);
        return view('admin.tentang.index', compact('tentang'));
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
            'tentang' => 'required',
            'whatsapp' => 'required',
        ]);

        $tentang = Tentang::firstOrCreate(
            [
                'id' => 1
            ],
            [
                "tentang" => $request->tentang,
                "video" => $request->video,
                "email" => $request->email,
                "phone" => $request->phone,
                "whatsapp" => $request->whatsapp,
                "alamat" => $request->alamat,
            ]
        );
        $tentang->tentang = $request->tentang;
        $tentang->video = $request->video;
        $tentang->email = $request->email;
        $tentang->phone = $request->phone;
        $tentang->whatsapp = $request->whatsapp;
        $tentang->alamat = $request->alamat;
        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'Berhasil update tentang');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tentang  $tentang
     */
    public function show(Tentang $tentang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tentang  $tentang
     */
    public function edit(Tentang $tentang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tentang  $tentang
     */
    public function update(Request $request, Tentang $tentang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tentang  $tentang
     */
    public function destroy(Tentang $tentang)
    {
        //
    }
}