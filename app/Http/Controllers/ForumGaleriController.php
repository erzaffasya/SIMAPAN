<?php

namespace App\Http\Controllers;

use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ForumGaleriController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumGaleri  $forum_galeri

     */
    public function destroy(ForumGaleri $forum_galeri)
    {
        $path = storage_path("app/public/img/forum_galeri/$forum_galeri->id_kategori_galeri");
        $path_tmp = storage_path("app/public/img/.thumbnail/forum_galeri/$forum_galeri->id_kategori_galeri");
        if (File::exists("$path/$forum_galeri->foto")) {
            File::delete("$path/$forum_galeri->foto");
        }
        if (File::exists("$path_tmp/$forum_galeri->foto")) {
            File::delete("$path_tmp/$forum_galeri->foto");
        }
        $forum_galeri->delete();
    }
}