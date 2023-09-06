<?php

namespace App\Http\Controllers;

use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use App\Models\Kluster;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

class KlusterController extends Controller
{


    public function edit($id)
    {
        $kluster = Kluster::where("kluster", $id)->first();
        return view('admin.kluster.index', compact("kluster"));
    }

    public function update(Request $request, Kluster $kluster)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ]);
        $file_name = $kluster->logo;

        if ($foto = $request->foto) {
            $path = storage_path("app/public/img/forum_galeri/$kluster->id");
            $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$kluster->id");
            if ($request->foto != null) {
                if (File::exists("$path/$kluster->foto")) {
                    File::delete("$path/$kluster->foto");
                }
                if (File::exists("$path_tmp/$kluster->foto")) {
                    File::delete("$path_tmp/$kluster->foto");
                }
            }

            $extention = $foto->extension();
            $file_name = time() . $kluster->kluster . '.' . $extention;
            $image = Image::make($foto);
            $image->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!File::exists("$path")) {
                File::makeDirectory("$path", $mode = 0777, true, true);
            }
            $image->save("$path/$file_name");

            $image_tmp = Image::make($foto);
            $image_tmp->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::exists("$path_tmp")) {
                File::makeDirectory("$path_tmp", $mode = 0777, true, true);
            }
            $image_tmp->save("$path_tmp/$file_name");
        }
        $kluster->logo = $file_name;
        $kluster->title = $request->title;
        $kluster->subtitle = $request->subtitle;
        $kluster->description = $request->description;
        $kluster->save();

        return redirect()->back()->with('success', "Kluster $kluster->kluster Berhasil Diubah");
    }
}