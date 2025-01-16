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
        $abouts = Tentang::all();
        return view('admin.tentang.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.tentang.create');
    }

    public function edit($id)
    {
        $tentang = Tentang::find($id);
        return view('admin.tentang.edit', compact('tentang'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required',
            'tentang' => 'required',
            'whatsapp' => 'required',
        ]);


        Tentang::create([
            "title" => $request->title,
            "tentang" => $request->tentang,
            "video" => $request->video,
            "email" => $request->email,
            "phone" => $request->phone,
            "whatsapp" => $request->whatsapp,
            "alamat" => $request->alamat,
        ]);

        return redirect()->route('tentang.index')->with('success', 'Berhasil menambah section tentang');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'tentang' => 'required',
            'whatsapp' => 'required',
            'video' => 'required',
        ]);


        $tentang = Tentang::find($id);

        if (!$tentang) {
            $tentang = new Tentang();
            $tentang->id = $id;
        }

        // Update data Tentang
        $tentang->title = $request->title;
        $tentang->tentang = $request->tentang;
        $tentang->video = $request->video;
        $tentang->email = $request->email;
        $tentang->phone = $request->phone;
        $tentang->whatsapp = $request->whatsapp;
        $tentang->alamat = $request->alamat;
        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'Berhasil update section tentang');
    }


    public function destroy($id)
    {
        $tentang = Tentang::find($id);
        $tentang->delete();
        return redirect()->route('tentang.index')->with('success', 'Berhasil menghapus section tentang');
    }
}
