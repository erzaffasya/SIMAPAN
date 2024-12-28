<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\ForumArtikel;
use App\Models\ForumGaleri;
use App\Models\ForumKategoriGaleri;
use App\Models\ForumPengurus;
use App\Models\ForumStruktur;
use App\Models\JumlahAnak;
use App\Models\Kantor;
use App\Models\Kebijakan;
use App\Models\Kegiatan;
use App\Models\Kelembagaan;
use App\Models\Kluster;
use App\Models\LayananPengasuhAnak;
use App\Models\PemberdayaanMasyarakat;
use App\Models\PersentaseAnak;
use App\Models\ProfilGaleri;
use App\Models\SekolahRamahAnak;
use App\Models\Siga;
use App\Models\SigaJenis;
use App\Models\Tentang;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function simapan()
    {
        $tentang = Tentang::all();
        $forumArtikel = ForumArtikel::where('id_kategori_artikel', 2)->limit(3)->orderBy('id', 'DESC')->get();
        $forumArtikelParenting = ForumArtikel::where('id_kategori_artikel', 1)->limit(4)->orderBy('id', 'DESC')->get();
        $kegiatan = Kegiatan::limit(3)->orderBy('id', 'DESC')->get();
        $faq = Faq::all();
        $banner = Banner::all();
        // dd($artikel->get());
        return view('landingpage.simapan', compact('banner', 'tentang', 'forumArtikel', 'kegiatan', 'faq', 'forumArtikelParenting'));
    }

    public function peta(Request $request)
    {
        // Ambil input dari filter
        $kecamatanFilter = $request->input('kecamatan', 'all');
        $kelurahanFilter = $request->input('kelurahan', 'all');

        // Query kantor, dengan filter kecamatan dan kelurahan jika ada
        $query = Kantor::query();

        if ($kecamatanFilter !== 'all') {
            $query->where('kecamatan', $kecamatanFilter);
        }

        if ($kelurahanFilter !== 'all') {
            $query->where('kelurahan', $kelurahanFilter);
        }

        $Kantor = $query->get();

        // Siapkan data lokasi untuk dikirim ke view
        $location = [];
        foreach ($Kantor as $item) {
            $location[] = [
                "slug" => $item->id,
                "detail_slug" => route('peta.detail', $item->id),
                "kantor" => $item->kantor,
                "deskripsi" => $item->deskripsi,
                "deskripsi_map" => $item->deskripsi_map,
                "latitude" => $item->latitude,
                "longitude" => $item->longitude,
                "foto" => asset("storage/img/kantor/$item->foto"),
                "kecamatan" => $item->kecamatan,
                "kelurahan" => $item->kelurahan,
            ];
        }

        // Ambil data kecamatan dan kelurahan dari Indonesia package
        $kecamatan = \Indonesia::search('balikpapan')->allDistricts();
        $kelurahan = \Indonesia::search('balikpapan')->allVillages();

        return view('landingpage.peta', compact('location', 'Kantor', 'kecamatan', 'kelurahan'));
    }



    public function detailPeta(Request $request, $id)
    {
        $Kantor = Kantor::with(['kecamatanKantor', 'kelurahanKantor', 'kegiatan'])->find($id);

        $s = $request->query("s") == "a" ? "ASC" : "DESC";
        $c = $request->query("c");

        return view('landingpage.detailPeta', compact(['Kantor', 's', 'c']));
    }

    public function forum()
    {
        $pengurus = ForumPengurus::all();
        $struktur = ForumStruktur::find(1);
        $artikel1 = ForumArtikel::where('id_kategori_artikel', 2)->orderBy('created_at', 'DESC')->first();
        $artikel2 = ForumArtikel::where('id_kategori_artikel', 2)->orderBy('created_at', 'DESC')->offset(1)->limit(3)->get();
        $artikel3 = ForumArtikel::where('id_kategori_artikel', 2)->orderBy('created_at', 'DESC')->offset(4)->paginate(8);
        $kegiatan = ForumGaleri::orderBy('created_at', 'DESC')->limit(8)->get();
        $ForumKategoriGaleri = ForumKategoriGaleri::where('kategori', 'F')->limit(8)->get();


        $kecamatan = \Indonesia::search('balikpapan')->allDistricts();
        $kelurahan =  \Indonesia::search('balikpapan')->allVillages();

        // dd($kegiatan);
        return view('landingpage.forum', compact('ForumKategoriGaleri', 'pengurus', 'struktur', 'artikel1', 'artikel2', 'artikel3', 'kegiatan', 'kecamatan', 'kelurahan'));
    }

    public function getArtikelByKelurahan($kelurahanId)
    {
        if ($kelurahanId === 'all') {
            // Jika semua kelurahan dipilih, ambil artikel tanpa filter kelurahan
            $artikel1 = ForumArtikel::with('kelurahanForumArtikel') // Eager loading kelurahan
                ->where('id_kategori_artikel', 2)
                ->orderBy('created_at', 'DESC')
                ->first();

            $artikel2 = ForumArtikel::with('kelurahanForumArtikel') // Eager loading kelurahan
                ->where('id_kategori_artikel', 2)
                ->orderBy('created_at', 'DESC')
                ->offset(1)
                ->limit(3)
                ->get();

            $artikel3 = ForumArtikel::with('kelurahanForumArtikel') // Eager loading kelurahan
                ->where('id_kategori_artikel', 2)
                ->orderBy('created_at', 'DESC')
                ->offset(4)
                ->paginate(8);
        } else {
            // Jika kelurahan dipilih, filter artikel berdasarkan kelurahan
            $artikel1 = ForumArtikel::with('kelurahanForumArtikel') // Eager loading kelurahan
                ->where('id_kategori_artikel', 2)
                ->where('kelurahan', $kelurahanId)
                ->orderBy('created_at', 'DESC')
                ->first();

            $artikel2 = ForumArtikel::with('kelurahanForumArtikel') // Eager loading kelurahan
                ->where('id_kategori_artikel', 2)
                ->where('kelurahan', $kelurahanId)
                ->orderBy('created_at', 'DESC')
                ->offset(1)
                ->limit(3)
                ->get();

            $artikel3 = ForumArtikel::with('kelurahanForumArtikel') // Eager loading kelurahan
                ->where('id_kategori_artikel', 2)
                ->where('kelurahan', $kelurahanId)
                ->orderBy('created_at', 'DESC')
                ->offset(4)
                ->paginate(8);
        }

        // Return JSON response
        return response()->json([
            'artikel1' => $artikel1,
            'artikel2' => $artikel2,
            'artikel3' => $artikel3
        ]);
    }



    public function profil()
    {
        $jumlahAnak = JumlahAnak::find(1);
        $kelembagaan = Kelembagaan::find(1);
        $kegiatan = ProfilGaleri::orderBy('created_at', 'DESC')->limit(8)->get();
        $ForumKategoriGaleri = ForumKategoriGaleri::where('kategori', 'P')->limit(8)->get();

        $apiKDRT = Http::get('http://103.144.82.202/api/grafik-kdrt');
        $grafikKDRT = $apiKDRT->json();

        $apiTotalKasus = Http::get('http://103.144.82.202/api/grafik-total-kasus');
        $grafikTotalKasus = $apiTotalKasus->json();

        $apiJenisKekerasan = Http::get('http://103.144.82.202/api/grafik-jenis-kekerasan');
        $grafikJenisKekerasan = $apiJenisKekerasan->json();

        $apiJenisLayan = Http::get('http://103.144.82.202/api/grafik-jenis-layanan');
        $grafikJenisLayanan = $apiJenisLayan->json();

        $apiPerkecamatan = Http::get('http://103.144.82.202/api/grafik-perkecamatan');
        $grafikPerkecamatan = $apiPerkecamatan->json();

        $apiPerkelurahan = Http::get('http://103.144.82.202/api/grafik-perkelurahan');
        $grafikPerkelurahan = $apiPerkelurahan->json();

        $apiPengaduan = Http::get('http://103.144.82.202/api/grafik-pengaduan');
        $grafikPengaduan = $apiPengaduan->json();


        return view('landingpage.profil', compact(
            'grafikKDRT',
            'grafikTotalKasus',
            'grafikJenisKekerasan',
            'grafikJenisLayanan',
            'grafikPerkecamatan',
            'grafikPerkelurahan',
            'grafikPengaduan',
            'ForumKategoriGaleri',
            'jumlahAnak',
            'kelembagaan',
            'kegiatan'
        ));
    }

    public function artikel(Request $request)
    {
        $s = $request->query("s") == "a" ? "ASC" : "DESC";

        $artikel1 = ForumArtikel::orderBy('created_at', 'DESC')->first();
        $artikel2 = ForumArtikel::orderBy('created_at', 'DESC')->offset(1)->limit(3)->get();

        if ($c = $request->query("c")) {
            $artikel3 = ForumArtikel::where("judul", "like", "%$c%")->orderBy('created_at', $s)->paginate(8);
        } else {
            $artikel3 = ForumArtikel::orderBy('created_at', $s)->paginate(8);
        }

        return view('landingpage.artikelindex', compact('artikel1', 'artikel2', 'artikel3', 'c', 's'));
    }


    public function artikelDetail($slug)
    {
        $artikel = ForumArtikel::where('slug', $slug)->first();
        $artikelLainnya = ForumArtikel::limit(3)->get();
        // dd($artikel);
        return view('landingpage.artikeldetail', compact('artikel', 'artikelLainnya'));
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function kegiatanForum()
    {
        $ForumKategoriGaleri = ForumKategoriGaleri::all();
        return view('landingpage.kegiatan', compact('ForumKategoriGaleri'));
    }


    public function kegiatanForumDetail($slug)
    {
        $ForumKategoriGaleri = ForumKategoriGaleri::where('slug', $slug)->first();
        $ForumGaleri = ForumGaleri::where('id_kategori_galeri', $ForumKategoriGaleri->id)->get();
        // dd($ForumGaleri, $ForumKategoriGaleri);
        return view('landingpage.kegiatandetail', compact('ForumGaleri', 'ForumKategoriGaleri'));
    }


    public function artikelKantor(Request $request)
    {
        $s = $request->query("s") == "a" ? "ASC" : "DESC";

        $kantorFilter = $request->query('k', 'all');
        $kecamatanFilter = $request->query('kecamatan', 'all');
        $kelurahanFilter = $request->query('kelurahan', 'all');
        $c = $request->query("c"); // Search term for "judul"

        $artikel1 = Kegiatan::orderBy('created_at', 'DESC')->first();

        $artikel2 = Kegiatan::orderBy('created_at', 'DESC')->offset(1)->limit(3)->get();

        $artikel3 = Kegiatan::with('kantor')->orderBy('created_at', $s);

        if ($c) {
            $artikel3->where("judul", "like", "%$c%");
        }

        if ($kecamatanFilter !== 'all') {
            $artikel3->whereHas('kantor', function ($query) use ($kecamatanFilter) {
                $query->where('kecamatan', $kecamatanFilter);
            });
        }

        if ($kelurahanFilter !== 'all') {
            $artikel3->whereHas('kantor', function ($query) use ($kelurahanFilter) {
                $query->where('kelurahan', $kelurahanFilter);
            });
        }

        $artikel3 = $artikel3->paginate(8);

        $kantor = Kantor::all();
        $kecamatan = \Indonesia::search('balikpapan')->allDistricts();
        $kelurahan = \Indonesia::search('balikpapan')->allVillages();

        return view('landingpage.artikelkantor', compact('artikel1', 'artikel2', 'artikel3', 'c', 's', 'kantor', 'kecamatan', 'kelurahan'));
    }



    public function kegiatanKantorDetail($slug)
    {
        // $ForumKategoriGaleri = ForumKategoriGaleri::where('slug', $slug)->first();
        // dd($ForumKategoriGaleri);
        $kegiatan = Kegiatan::where('slug', $slug)->first();
        $kegiatanLainnya = Kegiatan::limit(3)->get();
        // dd($kegiatan);
        // dd($ForumGaleri, $ForumKategoriGaleri);
        return view('landingpage.artikelkantordetail', compact('kegiatanLainnya', 'kegiatan'));
    }

    public function kluster6()
    {
        $lKebijakan = Kebijakan::all();



        return view("landingpage.kluster6", compact("lKebijakan"));
    }

    public function kluster1(Request $request)
    {
        $kartu_identitas = PersentaseAnak::select("kartu_identitas")->orderBy("tahun", "ASC")->pluck("kartu_identitas")->toArray();
        $akta_kelahiran = PersentaseAnak::select("akta_kelahiran")->orderBy("tahun", "ASC")->pluck("akta_kelahiran")->toArray();
        $tahun = PersentaseAnak::select("tahun")->orderBy("tahun", "ASC")->pluck("tahun")->toArray();

        $s = $request->query("s") == "a" ? "ASC" : "DESC";
        $c = $request->query("c", "");

        $kluster = Kluster::where("kluster", "1")->first();
        $artikel1 = $kluster->artikel()->orderBy("created_at", "DESC")->first();
        $artikel2 = $kluster->artikel()->orderBy("created_at", "DESC")->skip(1)->take(3)->get();


        $kluster = Kluster::where("kluster", "1")
            ->with(['artikel' => function ($query) use ($s, $c) {
                if ($c) {
                    $query->where("title", "like", "%$c%");
                }
                $query->orderBy("created_at", $s)->paginate(8);
            }, 'artikel.detail'])
            ->first();



        return view("landingpage.kluster1", compact("kartu_identitas", "akta_kelahiran", "tahun", "kluster", "c", "s", "artikel1", "artikel2"));
    }

    public function kluster2(Request $request)
    {
        $online = LayananPengasuhAnak::select("online")->orderBy("tahun", "ASC")->pluck("online")->toArray();
        $indoor = LayananPengasuhAnak::select("indoor")->orderBy("tahun", "ASC")->pluck("indoor")->toArray();
        $outdoor = LayananPengasuhAnak::select("outdoor")->orderBy("tahun", "ASC")->pluck("outdoor")->toArray();
        $tahun = LayananPengasuhAnak::select("tahun")->orderBy("tahun", "ASC")->pluck("tahun")->toArray();


        $s = $request->query("s") == "a" ? "ASC" : "DESC";
        $c = $request->query("c", "");


        $kluster = Kluster::where("kluster", "2")->first();
        $artikel1 = $kluster->artikel()->orderBy("created_at", "DESC")->first();
        $artikel2 = $kluster->artikel()->orderBy("created_at", "DESC")->skip(1)->take(3)->get();


        $kluster = Kluster::where("kluster", "2")
            ->with(['artikel' => function ($query) use ($s, $c) {
                if ($c) {
                    $query->where("title", "like", "%$c%");
                }
                $query->orderBy("created_at", $s)->paginate(8);
            }, 'artikel.detail'])
            ->first();

        return view("landingpage.kluster2", compact("online", "indoor", "outdoor", "tahun", "kluster", "artikel1", "artikel2"));
    }

    public function kluster3(Request $request)
    {
        $s = $request->query("s") == "a" ? "ASC" : "DESC";
        $c = $request->query("c", "");


        $kluster = Kluster::where("kluster", "3")->first();
        $artikel1 = $kluster->artikel()->orderBy("created_at", "DESC")->first();
        $artikel2 = $kluster->artikel()->orderBy("created_at", "DESC")->skip(1)->take(3)->get();

        $kluster = Kluster::where("kluster", "3")
            ->with(['artikel' => function ($query) use ($s, $c) {
                if ($c) {
                    $query->where("title", "like", "%$c%");
                }
                $query->orderBy("created_at", $s)->paginate(8);
            }, 'artikel.detail'])
            ->first();

        return view("landingpage.kluster3", compact("kluster", "artikel1", "artikel2"));
    }

    public function kluster4(Request $request)
    {
        $sekolah_ramah_anak = SekolahRamahAnak::where("isaktif", true)->limit(1)->get();
        $tahun = $sekolah_ramah_anak->pluck("tahun")->toArray();
        $sd = $sekolah_ramah_anak->pluck("sd")->first();
        $paud = $sekolah_ramah_anak->pluck("paud")->first();
        $smp = $sekolah_ramah_anak->pluck("smp")->first();
        $sma = $sekolah_ramah_anak->pluck("slta")->first();
        $slb = $sekolah_ramah_anak->pluck("slb")->first();
        $sekolah_ramah_anak = [$paud, $sd, $smp, $sma, $slb];

        $s = $request->query("s") == "a" ? "ASC" : "DESC";
        $c = $request->query("c", "");


        $kluster = Kluster::where("kluster", "4")->first();
        $artikel1 = $kluster->artikel()->orderBy("created_at", "DESC")->first();
        $artikel2 = $kluster->artikel()->orderBy("created_at", "DESC")->skip(1)->take(3)->get();

        $kluster = Kluster::where("kluster", "4")
            ->with(['artikel' => function ($query) use ($s, $c) {
                if ($c) {
                    $query->where("title", "like", "%$c%");
                }
                $query->orderBy("created_at", $s)->paginate(8);
            }, 'artikel.detail'])
            ->first();


        return view("landingpage.kluster4", compact("kluster", "sekolah_ramah_anak", "tahun", "artikel1", "artikel2"));
    }

    public function kluster5(Request $request)
    {
        $s = $request->query("s") == "a" ? "ASC" : "DESC";
        $c = $request->query("c", "");


        $kluster = Kluster::where("kluster", "5")->first();
        $artikel1 = $kluster->artikel()->orderBy("created_at", "DESC")->first();
        $artikel2 = $kluster->artikel()->orderBy("created_at", "DESC")->skip(1)->take(3)->get();

        $kluster = Kluster::where("kluster", "5")
            ->with(['artikel' => function ($query) use ($s, $c) {
                if ($c) {
                    $query->where("title", "like", "%$c%");
                }
                $query->orderBy("created_at", $s)->paginate(8);
            }, 'artikel.detail'])
            ->first();

        return view("landingpage.kluster5", compact("kluster", "artikel1", "artikel2"));
    }
    public function pemberdayaan()
    {
        $pemberdayaan = PemberdayaanMasyarakat::all();
        return view("landingpage.pemberdayaan", compact('pemberdayaan'));
    }
    public function siga()
    {
        $siga = Siga::all();
        $sigaJenis = SigaJenis::all();
        return view("landingpage.siga", compact('siga', 'sigaJenis'));
    }

    public function detailArtikel($kluster, $slug)
    {
        $klusterModel = Kluster::where("kluster", $kluster)
            ->with(['artikel' => function ($query) use ($slug) {
                $query->where('slug', $slug)->with('detail');
            }])->firstOrFail();


        $artikel = $klusterModel->artikel->first();



        if (!$artikel) {
            abort(404, 'Artikel tidak ditemukan di kluster ini');
        }

        $artikelLain = $klusterModel->artikel()
            ->where('slug', '!=', $slug)
            ->take(4)
            ->get();

        return view('landingpage.detail_kluster_artikel', compact('artikel', 'klusterModel', 'artikelLain'));
    }
}
