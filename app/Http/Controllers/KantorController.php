<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class KantorController extends Controller
{
    public function index()
    {
        $Kantor = Kantor::with(['kecamatanKantor', 'kelurahanKantor'])->get();
        return view('admin.kantor.index', compact('Kantor'));
    }

    public function create()
    {
        $lKecamatan = \Indonesia::search('balikpapan')->allDistricts();
        $lKelurahan =  \Indonesia::search('balikpapan')->allVillages();
        return view('admin.kantor.tambah', compact(['lKecamatan', 'lKelurahan']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->foto != null) {
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = storage_path("app/public/img/kantor/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save($path . $file_name, 80);
        } else {
            $file_name = null;
        }

        Kantor::create([
            'kantor' => $request->kantor,
            'deskripsi' => $request->deskripsi,
            'foto' => $file_name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'deskripsi_map' => $request->deskripsi_map,
            'link_map' => $request->link_map,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan
        ]);


        return redirect()->route('kantor.index')
            ->with('success', 'Kantor Berhasil Ditambahkan');
    }

    public function show($id)
    {
        // $Kantor =  Kantor::find($id);
        // return view('admin.kantor.Detailkantor.index', compact('Kantor', 'DetailKantor'));
    }


    public function edit($id)
    {
        $lKecamatan = \Indonesia::search('balikpapan')->allDistricts();
        $lKelurahan =  \Indonesia::search('balikpapan')->allVillages();
        $Kantor = Kantor::with(['kecamatanKantor', 'kelurahanKantor'])->find($id);
        return view('admin.kantor.ubah', compact(['Kantor', 'lKecamatan', 'lKelurahan']));
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
        $Kantor->kelurahan = $request->kelurahan;
        $Kantor->kecamatan = $request->kecamatan;

        if ($request->has("foto")) {
            $path = storage_path("app/public/img/kantor/");
            if (File::exists($path)) {
                Storage::delete("$path$Kantor->foto");
            }
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $path = storage_path("app/public/img/kantor/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save($path . $file_name, 80);

            $Kantor->foto = $file_name;
        }
        $Kantor->save();
        return redirect()->route('kantor.index')
            ->with('success', 'Kantor Berhasil Diubah');
    }

    public function destroy($id)
    {
        $Kantor = Kantor::findOrFail($id);
        Storage::delete("public/Kantor/$Kantor->foto");
        $Kantor->delete();
        return redirect()->route('kantor.index')
            ->with('success', 'Kantor Berhasil Dihapus');
    }
}
