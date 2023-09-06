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
                <div class="col-12 col-lg-8" style="height: 400px; overflow-y: scroll;">
                    <img src="{{ asset("storage/img/struktur/$struktur->foto") }}" alt="" class="w-100 rounded" style="object-fit: fill;">
                </div>
                <div class="col-12 col-lg-4">
                    <h1 class="fs-2 fw-bold text-success">Struktur Forum Anak Balikpapan</h1>
                    <p class="fs-5 text-secondary">{!! $struktur->deskripsi !!} </p>
                </div>
            </div>
        </div>
    </section>
    <section id="pengurus-section">
        <div class="bg-greens bg-img-overlay item1-img pt-5 pb-4 mt-5">
            <div class="container">
                <div class="text-center">
                    <h1 class="fs-1 fw-bold text-white mb-4">PROFIL PENGURUS</h1>
                </div>
                <div class="pengurus-slide">
                    @foreach ($pengurus as $item)
                        <div class="mx-2 h-100">
                            <figure class="h-100 d-flex flex-column mb-0">
                                <img src="{{ asset("storage/img/forum/pengurus/$item->foto") }}" alt=""
                                    class="w-100" height="280px" style="object-fit: cover; border-radius: 1rem;">
                                <figcaption class="px-0 py-2 text-center h-100">
                                    <p class="fw-bold mb-0 fs-5 lh-sm text-white">{{ $item->nama }}</p>
                                    <p class="text-secondary lh-sm mt-2 mb-0 text-white" style="opacity: 75%">{{ $item->jabatan }}</p>
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
                <a href="{{ route('landingpage.artikel') }}" class="btn btn-link text-decoration-none">Lihat Semua</a>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7">
                    <a href="{{ route('landingpage.artikeldetail', $artikel1->slug) }}" class="text-decoration-none">
                        <figure class="position-relative">
                            <img src="{{ asset("storage/img/forum_artikel/$artikel1->id_kategori_artikel/$artikel1->foto") }}"
                                alt="" class="w-100 rounded" height="370px">
                            <figcaption class="position-relative h-100 d-flex align-items-end">
                                <div class="px-2 py-3 m-0 w-100">
                                    <p class="fs-6 mb-2 text-secondary">{{ $artikel1->created_at->format('D, d M Y') }}
                                    </p>
                                    <h1 class="fs-3 fw-bold text-dark">
                                        {{-- {{ $artikel1->judul }} --}}
                                        {!! \Illuminate\Support\Str::limit($artikel1->judul, 45) !!}
                                    </h1>
                                    <p class="fs-6 mb-0 text-secondary">
                                        {{-- {!! $artikel1->isi !!} --}}
                                        {{-- { \Illuminate\Support\Str::limit($artikel1->isi, 45)} --}}
                                        {!! Str::limit(strip_tags($artikel1->isi), $limit = 200, $end = '...') !!}
                                    </p>

                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-12 col-lg-5">
                    @foreach ($artikel2 as $item)
                        <div class="card mb-3 w-100 border-0">
                            <a href="{{ route('landingpage.artikeldetail', $item->slug) }}"
                                class="text-decoration-none">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}"
                                            class="rounded w-100" alt="..." height="160px">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body h-100">
                                            <p class="fs-6 mb-2 text-secondary mute">
                                                {{ $item->created_at->format('D, d M Y') }}</p>
                                            <p class="fw-bold mb-2 lh-sm text-dark">
                                                {!! \Illuminate\Support\Str::limit($item->judul, 62) !!}
                                            </p>
                                            <p class="fs-6 mb-0 text-secondary">
                                                {!! Str::limit(strip_tags($item->isi), $limit = 62, $end = '...') !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row align-items-center gy-4">
                @foreach ($artikel3 as $item)
                    <div class="col-12 col-lg-3">
                        <a class="card-artikel1" href="{{ route('landingpage.artikeldetail', $item->slug) }}">
                            <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                                <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}"
                                    alt="" width="100%" height="350">
                                <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                    <p class="fw-bold mb-2 lh-sm text-dark">{!! \Illuminate\Support\Str::limit($item->judul, 55) !!}</p>
                                    <p class="fs-6 mb-0 text-secondary">{{ $item->created_at->format('D, d M Y') }}</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                @endforeach
                {!! $artikel3->links('vendor.pagination.bootstrap-4') !!}

            </div>
            <div class="row mt-4 justify-content-between bg-primary rounded align-items-center p-3">
                <div class="col-12 col-lg-auto">
                    <p class="fw-bold fs-5 text-white mb-0">Tulis Artikelmu sebagai Forum Komunitas Anak</p>
                </div>
                <div class="col-12 col-lg-2">
                    <a href="#" class="btn btn-light w-100 text-primary">Gabung Disini</a>
                </div>
            </div>
        </div>
    </section>
    <section id="kegiatan-section">
        <div class="container py-5">
            <h1 class="display-6 fw-bold mb-3 text-center">Kegiatan Forum Anak</h1>
            <div class="row g-0 gy-0">
                @foreach ($ForumKategoriGaleri as $item)
                    <div class="col-12 col-lg-3">
                        <a class="card-kegiatan" href="{{ route('kegiatan-forum-detail', $item->slug) }}">
                            <figure class="mb-0 position-relative">
                                <img src="{{ asset("storage/img/forum_galeri/$item->id/{$item->galeri->pluck('foto')->first()}") }}"
                                    alt="" width="100%" height="250">
                                <figcaption class="py-2 px-3 mx-auto">
                                    <div>
                                        <p class="fs-6 fw-bold mb-1 lh-sm">{{ $item->judul }}
                                        </p>
                                        <p class="mb-0">{{ $item->created_at->format('D, d M Y') }}</p>
                                    </div>
                                </figcaption>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $item->galeri->count() }}
                                </span>
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
