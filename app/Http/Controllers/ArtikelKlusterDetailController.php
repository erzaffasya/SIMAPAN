<?php

namespace App\Http\Controllers;

use App\Models\ArtikelKlusterDetail;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

class ArtikelKlusterDetailController extends Controller
{
    public function destroy(ArtikelKlusterDetail $artikel_kluster_detail)
    {
        $path = storage_path("app/public/img/artikel_kluster/{$artikel_kluster_detail->artikel->kluster->kluster}/$artikel_kluster_detail->id_kategori_galeri");
        $path_tmp = storage_path("app/public/img/.thumbnail/artikel_kluster/{$artikel_kluster_detail->artikel->kluster->kluster}/$artikel_kluster_detail->id_kategori_galeri");
        if (File::exists("$path/$artikel_kluster_detail->foto")) {
            File::delete("$path/$artikel_kluster_detail->foto");
        }
        if (File::exists("$path_tmp/$artikel_kluster_detail->foto")) {
            File::delete("$path_tmp/$artikel_kluster_detail->foto");
        }
        $artikel_kluster_detail->delete();
    }
}