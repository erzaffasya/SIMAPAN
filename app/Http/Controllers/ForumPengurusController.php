<?php

namespace App\Http\Controllers;

use App\Models\ForumPengurus;
use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ForumPengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $lPengurus = ForumPengurus::with(['kelurahanForumPengurus', 'kecamatanForumPengurus'])->get();
        return view('admin.forum.pengurus.index', compact('lPengurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $lKecamatan = \Indonesia::search('balikpapan')->allDistricts();
        $lKelurahan =  \Indonesia::search('balikpapan')->allVillages();
        return view('admin.forum.pengurus.tambah', compact(['lKecamatan', 'lKelurahan']));
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
            "jabatan" => 'required',
            "foto" => 'required|mimes:jpeg,png,jpg,gif',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            "is_show" => 'nullable'
        ]);

        if ($request->has("foto")) {
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $path = storage_path("app/public/img/forum/pengurus");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save("$path/$file_name", 80);
        } else {
            $file_name = null;
        }

        ForumPengurus::create([
            "nama" => $request->nama,
            "jabatan" => $request->jabatan,
            "foto" => $file_name,
            "kecamatan" => $request->kecamatan,
            "kelurahan" => $request->kelurahan,
            "is_show" => $request->is_show ? True : False
        ]);

        return redirect()->route('forum-pengurus.index')->with('success', "Forum pengurus berhasil Dibuat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumPengurus  $forum_penguru
     */
    public function show(ForumPengurus $forum_penguru)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumPengurus  $forum_penguru
     */
    public function edit(ForumPengurus $forum_penguru)
    {
        $forum_penguru = ForumPengurus::with(['kelurahanForumPengurus', 'kecamatanForumPengurus'])->find($forum_penguru->id);
        $lKecamatan = \Indonesia::search('balikpapan')->allDistricts();
        $lKelurahan =  \Indonesia::search('balikpapan')->allVillages();
        return view('admin.forum.pengurus.ubah', compact(['forum_penguru', 'lKecamatan', 'lKelurahan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumPengurus  $forum_penguru
     */
    public function update(Request $request, ForumPengurus $forum_penguru)
    {
        $request->validate([
            "nama" => 'required',
            "jabatan" => 'required',
            "foto" => 'nullable|mimes:jpeg,png,jpg,gif',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            "is_show" => 'nullable'
        ]);

        if ($request->has("foto")) {
            $path = storage_path("app/public/img/forum/pengurus");
            if (File::exists("$path/$forum_penguru->foto")) {
                File::delete("$path/$forum_penguru->foto");
            }
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save("$path/$file_name", 80);
        } else {
            $file_name = $forum_penguru->foto;
        }

        $forum_penguru->nama = $request->nama;
        $forum_penguru->jabatan = $request->jabatan;
        $forum_penguru->foto = $file_name;
        $forum_penguru->kecamatan = $request->kecamatan;
        $forum_penguru->kelurahan = $request->kelurahan;
        $forum_penguru->is_show = $request->is_show ? True : False;
        $forum_penguru->save();

        return redirect()->route('forum-pengurus.index')->with('success', "Forum pengurus berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumPengurus  $forum_penguru
     */
    public function destroy(ForumPengurus $forum_penguru)
    {
        $path = storage_path("app/public/img/forum/pengurus");
        if (File::exists("$path/$forum_penguru->foto")) {
            File::delete("$path/$forum_penguru->foto");
        }
        $forum_penguru->delete();

        return redirect()->route('forum-pengurus.index')->with('success', "Forum pengurus berhasil Dihapus");
    }
}
