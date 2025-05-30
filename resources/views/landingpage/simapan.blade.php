<x-guest-layout>
    <section id="header-hero">
        <div class="container">
            <div class="header-title text-center mt-5">
                <div class="d-block d-lg-flex align-items-center justify-content-center">
                    <img src="{{ asset('tlandingpage/asset/img/logo-simapan.png') }}" alt="" height="50px"
                        class="logo-simapan">
                    <h1 class="fs-2 ms-2">SISTEM MANAJEMEN PERLINDUNGAN ANAK (SIMAPAN)</h1>
                </div>
                <div class="mx-auto">
                    <p class="lead text-secondary fs-6 mb-4">Mari Wujudkan Balikpapan Menuju Kota Layak Anak</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="#about-program" type="button" class="btn btn-primary px-4 gap-3">Lihat Layanan</a>
                        <a href="/" type="button" class="btn btn-link px-4 text-decoration-none">Kembali ke
                            Portal</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-relative">
            <img src="{{ asset('tlandingpage/asset/img/crop-slider-bottom.png') }}" class=" w-100 crop-slider-bottom"
                alt="">
            <img src="{{ asset('tlandingpage/asset/img/crop-slider.png') }}" class="w-100 crop-slider-top"
                alt="">
            <div class="header-slide">
                <div>
                    <figure class="px-3 mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/p1-1.jpg') }}" width="280" height="250">
                    </figure>
                </div>
                <div>
                    <figure class="px-3 mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/p1-2.jpg') }}" width="280" height="250">
                    </figure>
                </div>
                <div>
                    <figure class="px-3 mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/p1-3.jpg') }}" width="280" height="250">
                    </figure>
                </div>
                <div>
                    <figure class="px-3 mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/p1-4.jpg') }}" width="280" height="250">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section id="about-program">

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">



                @foreach ($tentang as $index => $item)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="max-height: 90vh;">
                        <div class="bg-blues bg-img-overlay item1-img py-5">
                            <div class="container">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-11 col-sm-12 col-md-10 col-lg-5">
                                        <iframe width="100%" height="315" class="yt-tentang rounded"
                                            src="{{ $item->video ?? '' }}" title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="col-11 col-sm-12 col-md-10 col-lg-6">
                                        <h1 class="fs-2 text-white fw-normal">{{ $item->title ?? '' }}</h1>
                                        <p class="fs-5 desc-tentang text-white lh-lg">{{ $item->tentang ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="row gy-2 mt-2 justify-content-center about-program-layanan">
                                    <div
                                        class="col-5 col-sm-6 col-md-5 col-lg-4 d-flex justify-content-center align-items-center">
                                        <a href="https://play.google.com/store/apps/details?id=com.laporint.lapor_int"
                                            class="text-decoration-none d-flex">
                                            <img src="{{ asset('tlandingpage/asset/img/call-incoming.png') }}"
                                                height="30px" alt="" class="me-3">
                                            <p class="fs-5 fw-bold text-white">Apps Mobile TOPAN</p>
                                        </a>
                                    </div>
                                    <div
                                        class="col-5 col-sm-6 col-md-5 col-lg-4 d-flex justify-content-center align-items-center">
                                        <a href="https://wa.me/62816220077" class="text-decoration-none d-flex">
                                            <img src="{{ asset('tlandingpage/asset/img/clipboard.png') }}"
                                                height="30px" alt="" class="me-3">
                                            <p class="fs-5 fw-bold text-white">Konsultasi Psikolog</p>
                                        </a>
                                    </div>
                                    <div
                                        class="col-5 col-sm-6 col-md-5 col-lg-4 d-flex justify-content-center align-items-center">
                                        <a href="/artikel-kantor" class="text-decoration-none d-flex">
                                            <img src="{{ asset('tlandingpage/asset/img/clipboard.png') }}"
                                                height="30px" alt="" class="me-3">
                                            <p class="fs-5 fw-bold text-white">Kegiatan PPATBM</p>
                                        </a>
                                    </div>
                                    <div
                                        class="col-5 col-sm-6 col-md-5 col-lg-4 d-flex justify-content-center align-items-center">
                                        <a href="https://wa.me/62816220077" class="text-decoration-none d-flex">
                                            <img src="{{ asset('tlandingpage/asset/img/shield.png') }}" height="30px"
                                                alt="" class="me-3">
                                            <p class="fs-5 fw-bold text-white">Konsultasi Hukum KTA</p>
                                        </a>
                                    </div>
                                    <div
                                        class="col-5 col-sm-6 col-md-5 col-lg-4 d-flex justify-content-center align-items-center">
                                        <a href="/forum" class="text-decoration-none d-flex">
                                            <img src="{{ asset('tlandingpage/asset/img/note-text.png') }}"
                                                height="30px" alt="" class="me-3">
                                            <p class="fs-5 fw-bold text-white">Forum Anak</p>
                                        </a>
                                    </div>
                                    <div
                                        class="col-5 col-sm-6 col-md-5 col-lg-4 d-flex justify-content-center align-items-center">
                                        <a href="#highlight-parenting" class="text-decoration-none d-flex">
                                            <img src="{{ asset('tlandingpage/asset/img/note-text.png') }}"
                                                height="30px" alt="" class="me-3">
                                            <p class="fs-5 fw-bold text-white">Edukasi Anak</p>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="row justify-content-center iklan-tentang rounded align-items-center mt-3 bg-white p-0 ">
                                    <div class="col-12 col-sm-12 col-md-10 col-lg-6">
                                        <img src="https://layanan112.kominfo.go.id/images/logo/logo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </section>

    <section id="highlight-forumanak">
        <div class="container py-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-11 col-lg-3">
                    <h1 class="display-6">Artikel Forum Anak</h1>
                    <p class="fs-5 text-secondary mb-5">Temukan informasi mengenai anak dari berbagai sumber komunitas
                        forum
                    </p>
                    <a href="{{ route('landingpage.artikel') }}"
                        class="d-none d-lg-block btn btn-outline-primary w-100">Lihat Semua
                        Artikel</a>
                </div>
                @foreach ($forumArtikel as $item)
                    <div class="col-11 col-sm-11 col-md-6 col-lg-3 mb-3">
                        <a class="card-artikel1" href="{{ route('landingpage.artikeldetail', $item->slug) }}">
                            <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                                <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}"
                                    alt="" width="100%" height="350">
                                <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                    <p class="fw-bold mb-2 lh-sm text-dark">
                                        {!! \Illuminate\Support\Str::limit($item->judul, 55) !!}
                                    </p>
                                    <p class="fs-6 mb-0 text-secondary">{{ $item->created_at->format('d M Y') }}</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                @endforeach
                <div class="col-10 col-sm-10 col-md-8 d-none-lg">
                    <a href="{{ route('landingpage.artikel') }}"
                        class="d-lg-none btn btn-outline-primary w-100">Lihat Semua
                        Artikel</a>
                </div>
            </div>
            <div class="join-forumanak row mt-4 justify-content-between bg-primary rounded align-items-center p-3">
                <div class="col-12 col-sm-12 col-md-8 col-lg-auto">
                    <p class="fw-bold fs-5 text-white mb-0">Tulis Artikelmu sebagai Forum Komunitas Anak</p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <a href="{{ route('login') }}" class="btn btn-light w-100 text-primary">Gabung Disini</a>
                </div>
            </div>
        </div>
    </section>

    <section id="ppatbm-program">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="maps-ppatbm col-11 col-lg-8">
                    <h1 class="fs-3 mb-3">Maps Pemetaan</h1>
                    <figure class="card-hg-maps position-relative rounded">
                        <img src="{{ asset('tlandingpage/asset/img/maps-mockup.jpg') }}" alt=""
                            class="w-100 rounded h-100 position-absolute">
                        <figcaption class="position-relative h-100 d-flex align-items-end">
                            <div class="row align-items-center px-2 py-3 m-0 w-100">
                                <div class="col-12 col-lg">
                                    <h1 class="fs-2 fw-normal text-white">Peta Pemetaan PPATBM</h1>
                                    <p class="fs-5 mb-0 text-white">Temukan informasi sebaran lokasi-lokasi PPATBM Kota
                                        Balikpapan</p>
                                </div>
                                <div class="col-12 col-lg-auto">
                                    <div>
                                        <a href="/peta" class="btn btn-primary">Lihat Peta</a>
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="keg-ppatbm col-11 col-lg-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="fs-3 mb-0">Kegiatan PPATBM</h1>
                        <a href="{{ route('landingpage.artikel-kantor') }}"
                            class="btn btn-link text-decoration-none text-end">Lihat Semua</a>
                    </div>
                    @foreach ($kegiatan as $item)
                        <div class="card mb-3 w-100 border-0">
                            <a href="{{ route('landingpage.artikel-kantor-detail', $item->slug) }}"
                                class="text-decoration-none">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-4">
                                        <img src="{{ asset("storage/img/kegiatan/$item->kantor_id/$item->foto") }}"
                                            class="rounded" alt="..." width="100%" height="100px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body h-100">
                                            <p class="fw-bold mb-2 lh-sm text-dark">
                                                {!! \Illuminate\Support\Str::limit($item->judul, 55) !!}
                                            </p>
                                            <p class="fs-6 mb-0 text-secondary">
                                                {{ $item->created_at->format('D, d M Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="highlight-parenting">
        <div class="container py-5">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="display-6 mb-3">Artikel Edukasi Anak</h1>
                <a href="{{ route('landingpage.artikel') }}" class="btn btn-link text-decoration-none text-end">Lihat
                    Semua</a>
            </div>
            <div class="row align-items-center justify-content-center">
                @foreach ($forumArtikelParenting as $item)
                    <div class="col-11 col-lg-3 mb-3">
                        <a class="card-artikel1" href="{{ route('landingpage.artikeldetail', $item->slug) }}">
                            <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                                <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}"
                                    alt="" width="100%" height="350">
                                <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                    <p class="fw-bold mb-2 lh-sm text-dark">{!! \Illuminate\Support\Str::limit($item->judul, 55) !!}</p>
                                    <p class="fs-6 mb-0 text-secondary">{{ $item->created_at->format('D, d M Y') }}
                                    </p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- <section id="faq-section">
        <div class="bg-blues bg-img-overlay item1-img py-5">
            <div class="container">
                <h1 class="display-6 mb-1 text-white text-center">Frequently Asked Question (FaQ)</h1>
                <p class="fs-5 mb-3 text-white text-center mb-2">Pertanyaan yang sering muncul mengenai DP3AKB</p>
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faq as $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne{{ $item->id }}" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            {{ $item->question }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{ $item->id }}" class="accordion-collapse collapse "
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion px-3" id="accordionPanelsStayOpenExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapseOne{{ $item->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseOne{{ $item->id }}">
                                                            Jawaban Menurut Psikolog
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseOne{{ $item->id }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingOne">
                                                        <div class="accordion-body">
                                                            {!! $item->answer_psikolog !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapseTwo{{ $item->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseTwo{{ $item->id }}">
                                                            Jawaban Menurut Agama
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseTwo{{ $item->id }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingTwo">
                                                        <div class="accordion-body">
                                                            {!! $item->answer_religius !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="iklan-banner">
        <div class="bg-blues bg-img-overlay item1-img py-5">
            <div class="container">
                <div class="slide-1-view">
                    @foreach ($banner as $item)
                        <figure class="mb-0 mx-2">
                            <a target="_blank" href="{{ route('banner-detail', $item->id) }}">
                                <img class="rounded" src="{{ asset("storage/img/banner/$item->banner") }}"
                                    width="100%" height="450px" style="object-fit: contain;">
                            </a>
                        </figure>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="aspirasi-section">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-11 col-lg-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br />
                    @endif

                    <h1 class="display-6">Form Aspirasi</h1>
                    <p class="fs-5 text-secondary mb-4">Berikan aspirasi anda mengenai program DP3AKB
                    </p>
                    <form action="{{ route('kirim-aspirasi') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="nama" class="form-control form-control-lg"
                                id="exampleFormControlInput1" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control form-control-lg"
                                id="exampleFormControlInput2" placeholder="Alamat Email">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control form-control-lg" name="aspirasi" id="exampleFormControlTextarea1" rows="2"
                                placeholder="Aspirasi anda"></textarea>
                        </div>

                        <div class="form-group mb-4 row">
                            <div class="col-md-6 captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>

                        <div class="form-group mb-4 row">
                            <div class="col-md-6">
                                <input id="captcha" type="text" class="form-control"
                                    placeholder="Enter Captcha" required="true" name="captcha">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg w-100 btn-primary">Kirim Aspirasi</button>
                    </form>
                </div>
                <div class="col-11 col-lg-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8562234475207!2d116.86530067445288!3d-1.258285535595073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1468c55555555%3A0x9876be7af3580494!2sDinas%20Pemberdayaan%20Perempuan%20Perlindungan%20Anak%20dan%20Keluarga%20Berencana%20(DP3AKB)%20Kota%20Balikpapan!5e0!3m2!1sid!2sid!4v1690004492153!5m2!1sid!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script type="text/javascript">
            console.log('Button clicked')
            $('#reload').click(function() {
                $.ajax({
                    type: 'GET',
                    url: 'reload-captcha',
                    success: function(data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });
        </script>
    @endpush
</x-guest-layout>
