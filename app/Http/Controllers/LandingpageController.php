<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ForumArtikel;
use App\Models\ForumPengurus;
use App\Models\ForumStruktur;
use App\Models\JumlahAnak;
use App\Models\Kantor;
use App\Models\Kelembagaan;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LandingpageController extends Controller
{
    public function simapan()
    {
        $tentang = Tentang::find(1);
        $forumArtikel = ForumArtikel::limit(3)->orderBy('id', 'DESC')->get();
        // dd($artikel->get());
        return view('landingpage.simapan',compact('tentang', 'forumArtikel'));
    }

    public function peta()
    {
        $Kantor = Kantor::all();
        $location = [];
        foreach ($Kantor as $item) {
            $location[] = [
                "kantor" => $item->kantor,
                "deskripsi_map" => $item->deskripsi_map,
                "latitude" => $item->latitude,
                "longitude" => $item->longitude
            ];
        }
        // dd($location);
        return view('landingpage.peta', compact('location'));
    }

    public function forum (){
        $pengurus = ForumPengurus::all();
        $struktur = ForumStruktur::find(1);
        return view('landingpage.forum', compact('pengurus','struktur'));
    }

    public function profil() {
        $jumlahAnak = JumlahAnak::find(1);
        $kelembagaan = Kelembagaan::find(1);
        return view('landingpage.profil', compact('jumlahAnak', 'kelembagaan'));
    }
}
