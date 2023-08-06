<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Faq;
use App\Models\ForumArtikel;
use App\Models\ForumGaleri;
use App\Models\ForumPengurus;
use App\Models\ForumStruktur;
use App\Models\JumlahAnak;
use App\Models\Kantor;
use App\Models\Kegiatan;
use App\Models\Kelembagaan;
use App\Models\ProfilGaleri;
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
        $forumArtikelParenting = ForumArtikel::limit(4)->orderBy('id', 'DESC')->get();
        $kegiatan = Kegiatan::limit(3)->orderBy('id', 'DESC')->get();
        $faq = Faq::all();
        // dd($artikel->get());
        return view('landingpage.simapan',compact('tentang', 'forumArtikel', 'kegiatan', 'faq','forumArtikelParenting'));
    }

    public function peta()
    {
        $Kantor = Kantor::all();
        // dd($Kantor);
        $location = [];
        foreach ($Kantor as $item) {
            $location[] = [
                "kantor" => $item->kantor,
                "deskripsi_map" => $item->deskripsi_map,
                "latitude" => $item->latitude,
                "link" => $item->link_map,
                "foto" => asset("storage/img/kantor/$item->foto"),
                "longitude" => $item->longitude
            ];
        }
        // dd($location);
        return view('landingpage.peta', compact('location'));
    }

    public function forum (){
        $pengurus = ForumPengurus::all();
        $struktur = ForumStruktur::find(1);
        $artikel1 = ForumArtikel::orderBy('created_at','DESC')->first();
        $artikel2 = ForumArtikel::orderBy('created_at','DESC')->offset(1)->limit(3)->get();
        $artikel3 = ForumArtikel::orderBy('created_at','DESC')->offset(4)->limit(3)->get();
        $kegiatan = ForumGaleri::orderBy('created_at','DESC')->limit(8)->get();
        // dd($kegiatan);
        return view('landingpage.forum', compact('pengurus','struktur', 'artikel1','artikel2','artikel3', 'kegiatan'));
    }

    public function profil() {
        $jumlahAnak = JumlahAnak::find(1);
        $kelembagaan = Kelembagaan::find(1);
        $kegiatan = ProfilGaleri::orderBy('created_at','DESC')->limit(8)->get();
        return view('landingpage.profil', compact('jumlahAnak', 'kelembagaan','kegiatan'));
    }

    public function artikel(){

        $artikel1 = ForumArtikel::orderBy('created_at','DESC')->first();
        $artikel2 = ForumArtikel::orderBy('created_at','DESC')->offset(1)->limit(3)->get();
        $artikel3 = ForumArtikel::orderBy('created_at','DESC')->paginate(8);
        return view('landingpage.artikelindex', compact('artikel1','artikel2','artikel3'));
    }


    public function artikelDetail($slug){
        $artikel = ForumArtikel::where('slug', $slug)->first();
        $artikelLainnya = ForumArtikel::limit(3)->get();
        // dd($artikel);
        return view('landingpage.artikeldetail', compact('artikel','artikelLainnya'));
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
