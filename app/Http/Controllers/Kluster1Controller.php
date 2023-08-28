<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kluster1Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.kluster1.index');
    }

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
        $tentang->id = 1;
        $tentang->tentang = $request->tentang;
        $tentang->video = $request->video;
        $tentang->email = $request->email;
        $tentang->phone = $request->phone;
        $tentang->whatsapp = $request->whatsapp;
        $tentang->alamat = $request->alamat;
        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'Berhasil update tentang');
    }
}
