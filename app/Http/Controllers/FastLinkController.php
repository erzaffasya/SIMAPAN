<?php

namespace App\Http\Controllers;

use App\Models\FastLink;
use Illuminate\Http\Request;

class FastLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $fastlinks = FastLink::all();
        return view('admin.fastlink.index', compact('fastlinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.fastlink.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            "judul" => "required",
            "link" => "required",
        ]);

        FastLink::create([
            "judul" => $request->judul,
            "link" => $request->link,
        ]);

        return redirect()->route('fastlink.index')->with('success', 'Berhasil Menambahkan Fast Link');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FastLink  $fastlink
     */
    public function show(FastLink $fastlink)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FastLink  $fastlink
     */
    public function edit(FastLink $fastlink)
    {
        return view('admin.fastlink.ubah', compact('fastlink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FastLink  $fastlink
     */
    public function update(Request $request, FastLink $fastlink)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required'
        ]);

        $fastlink->judul = $request->judul;
        $fastlink->link = $request->link;
        $fastlink->save();

        return redirect()->route('fastlink.index')->with('success', "Berhasil Mengubah Fast Link");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FastLink  $fastlink
     */
    public function destroy(FastLink $fastlink)
    {
        $fastlink->delete();
        return redirect()->route('fastlink.index')->with('success', "Berhasil Menghapus Fast Link");
    }
}