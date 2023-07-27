<?php

namespace App\Http\Controllers;

use App\Models\ForumStruktur;
use Illuminate\Http\Request;

class ForumStrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $struktur = ForumStruktur::find(1);
        return view('admin.forum.struktur.index', compact('struktur'));
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
            'foto' => 'nullable|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required',
        ]);

        $struktur = ForumStruktur::find(1);

        if ($struktur) {
            $struktur->deskripsi = $request->deskripsi;
        }else{

        }

        if ($request->foto) {

        }

        $tentang = ForumStruktur::firstOrCreate(
            [
                'id' => 1
            ],
            [
                "deskripsi" => $request->deskripsi,
                "foto" => $request->foto,
            ]
        );
        $tentang->deskripsi = $request->deskripsi;
        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'Berhasil update tentang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumStruktur  $forumStruktur
     */
    public function show(ForumStruktur $forumStruktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumStruktur  $forumStruktur
     */
    public function edit(ForumStruktur $forumStruktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumStruktur  $forumStruktur
     */
    public function update(Request $request, ForumStruktur $forumStruktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumStruktur  $forumStruktur
     */
    public function destroy(ForumStruktur $forumStruktur)
    {
        //
    }
}
