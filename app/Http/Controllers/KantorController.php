<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class KantorController extends Controller
{
    public function index()
    {
        $Kantor = Kantor::all();
        return view('admin.Kantor.index', compact('Kantor'));
    }

    public function create()
    {
        return view('admin.Kantor.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'ft' => 'required'
        ]);

        if ($request->foto != null) {
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Kantor/" . $file_name;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path('storage/Kantor/' . $file_name), 80);
        } else {
            $file_name = null;
        }

        $Kantor = Kantor::create([
            'kantor' => $request->kantor,
            'deskripsi' => $request->deskripsi,
            'foto' => $txt,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'deskripsi_map' => $request->deskripsi_map,
            'link_map' => $request->link_map
        ]);


        return redirect()->route('Kantor.index')
            ->with('success', 'Kantor Berhasil Ditambahkan');
    }

    public function show($id)
    {
        // $Kantor =  Kantor::find($id);
        // return view('admin.Kantor.DetailKantor.index', compact('Kantor', 'DetailKantor'));
    }


    public function edit($id)
    {
        $Kantor = Kantor::find($id);
        return view('admin.Kantor.ubah', compact('Kantor'));
    }

    public function update(Request $request, $id)
    {
        $Kantor = Kantor::findOrFail($id);
        $Kantor->kantor = $request->kantor;
        $Kantor->deskripsi = $request->deskripsi;
        $Kantor->latitude = $request->latitude;
        $Kantor->longitude = $request->longitude;
        $Kantor->deskripsi_map = $request->deskripsi_map;
        $Kantor->link_map = $request->link_map;

        if ($request->has("foto")) {
            Storage::delete("public/Kantor/$Kantor->foto");
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/Kantor/" . $file_name;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path('storage/Kantor/' . $file_name), 80);
        }
        $Kantor->save();
        return redirect()->route('Kantor.index')
            ->with('success', 'Kantor Berhasil Diubah');
    }

    public function destroy($id)
    {
        $Kantor = Kantor::findOrFail($id);
        Storage::delete("public/Kantor/$Kantor->foto");
        $Kantor->delete();
        return redirect()->route('Kantor.index')
            ->with('success', 'Kantor Berhasil Dihapus');
    }
}
