<x-guest-layout>
    <section id="header-hero">
        <div class="container">
            <div class="header-title text-center mt-5">
                <h1 class="fs-1 fw-bold">FORUM ANAK BALIKPAPAN</h1>
                <div class="mx-auto">
                    <p class="lead text-secondary mb-4">Mari Wujudkan Balikpapan Menuju Kota Layak Anak</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-6">
                    <img src="{{ asset("storage/img/struktur/$struktur->foto") }}" alt="" class="w-100 rounded"
                        height="320px" style="object-fit: cover;">
                </div>
                <div class="col-6">
                    <h1 class="fs-2 fw-bold">Struktur Forum Anak Balikpapan</h1>
                    <p class="fs-5">{!! $struktur->deskripsi !!} </p>
                </div>
            </div>
        </div>
    </section>
    <section id="pengurus-section">
        <div class="bg-greens bg-img-overlay item1-img py-5 mt-5">
            <div class="container">
                <div class="text-center">
                    <h1 class="fs-1 fw-bold text-white mb-4">PROFIL PENGURUS</h1>
                </div>
                <div class="pengurus-slide">
                    @foreach ($pengurus as $item)
                        <div class="mx-2">
                            <figure class="rounded overflow-hidden">
                                <img src="{{ asset("storage/img/forum/pengurus/$item->foto") }}" alt=""
                                    class="w-100" height="280px" style="object-fit: cover;">
                                <figcaption class="bg-white px-3 py-2 text-center">
                                    <p class="fw-bold mb-0">{{ $item->nama }}</p>
                                    <p class="text-secondary mb-0">{{ $item->jabatan }}</p>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="ppatbm-program">
        <div class="container py-5">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="display-6 fw-bold mb-3">Artikel Forum Anak</h1>
                <a href="{{route('landingpage.artikel')}}" class="btn btn-link text-decoration-none">Lihat Semua</a>
            </div>
            <div class="row">
                <div class="col-7">
                    <figure class="position-relative">
                        <img src="{{ asset("storage/img/forum_artikel/$artikel1->id_kategori_artikel/$artikel1->foto") }}"
                            alt="" class="w-100 rounded" height="370px">
                        <figcaption class="position-relative h-100 d-flex align-items-end">
                            <div class="px-2 py-3 m-0 w-100">
                                <p class="fs-6 mb-2 text-secondary">{{ $artikel1->created_at->format('D, d M Y') }}</p>
                                <h1 class="fs-3 fw-bold">{{ $artikel1->judul }}</h1>
                                <p class="fs-6 mb-0 text-secondary">{!! $artikel1->isi !!}</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-5">
                    @foreach ($artikel2 as $item)
                        <div class="card mb-3 w-100 border-0">
                            <a href="#" class="text-decoration-none">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}"
                                            class="img-fluid rounded h-100" alt="...">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body h-100">
                                            <p class="fs-6 mb-2 text-secondary mute">{{ $item->created_at->format('D, d M Y') }}</p>
                                            <p class="fw-bold mb-2 lh-sm text-dark">{{ $item->judul }}</p>
                                            <p class="fs-6 mb-0 text-secondary">{!! $item->isi !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row align-items-center">
                @foreach ($artikel3 as $item)
                <div class="col-3">
                    <a class="card-artikel1" href="#">
                        <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                            <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}" alt=""
                                width="100%" height="350">
                            <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                <p class="fw-bold mb-2 lh-sm text-dark">{{ $item->judul }}</p>
                                <p class="fs-6 mb-0 text-secondary">{{ $item->created_at->format('D, d M Y') }}</p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row mt-4 justify-content-between bg-primary rounded align-items-center p-3">
                <div class="col-auto">
                    <p class="fw-bold fs-5 text-white mb-0">Tulis Artikelmu sebagai Forum Komunitas Anak</p>
                </div>
                <div class="col-2">
                    <a href="#" class="btn btn-light w-100 text-primary">Gabung Disini</a>
                </div>
            </div>
        </div>
    </section>
    <section id="kegiatan-section">
        <div class="container py-5">
            <h1 class="display-6 fw-bold mb-3 text-center">Kegiatan Forum Anak</h1>
            <div class="row g-0 gy-0">
                <div class="col-3">
                    <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" class="w-100" alt="">
                </div>
                <div class="col-3">
                    <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" class="w-100" alt="">
                </div>
                <div class="col-3">
                    <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" class="w-100" alt="">
                </div>
                <div class="col-3">
                    <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" class="w-100" alt="">
                </div>
                <div class="col-3">
                    <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" class="w-100" alt="">
                </div>
                <div class="col-3">
                    <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" class="w-100" alt="">
                </div>
                <div class="col-3">
                    <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" class="w-100" alt="">
                </div>
                <div class="col-3">
                    <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
