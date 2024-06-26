<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('tlandingpage/asset/img/logo-3.png') }}">

    <!-- Bootstrap CSS -->
    <link href="{{asset('tlandingpage/asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('tlandingpage/asset/css/design.css')}}">

    <title>Portal DP3AKB</title>
</head>

<body>
    <main>
        <section class="nav-top nav-top-portal2">
            <figure class="mb-0 bg-white d-flex flex-wrap justify-content-center align-items-center px-4 py-2">
                <div class="me-2">
                    <img src="{{asset('tlandingpage/asset/img/logo-1.png')}}" alt="">
                    <img src="{{asset('tlandingpage/asset/img/logo-2.png')}}" alt="">
                    <img src="{{asset('tadmin/assets/img/logo-dagri.jpeg')}}" alt="">
                    <img src="{{asset('tadmin/assets/img/logo posyantek.jpeg')}}" alt="">
                </div>
                <figcaption class="fw-bold fs-5">Pemberdayaan dan Perlindungan Perempuan dan Pemberdayaan Masyarakat</figcaption>
            </figure>
        </section>
        <div id="portal-1" class="row gx-0 align-items-md-stretch h-100">
            <div class="card-bidang card-portal-2 col-md-4 col-sm-6 col-12">
                <figure class="h-100 position-relative text-white">
                    <img src="{{asset('tlandingpage/asset/img/siga.jpeg')}}" alt="">
                    <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
                        <h1 class="fw-bold display-6">SIGA</h1>
                        <a href="{{url('siga')}}" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button">Kunjungi</a>
                    </figcaption>
                </figure>
            </div>
            <div class="card-bidang card-portal-2 col-md-4 col-sm-6 col-12">
                <figure class="h-100 position-relative text-white">
                    <img src="{{asset('tlandingpage/asset/img/puspaga.jpeg')}}" alt="">
                    <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
                        <h1 class="fw-bold display-6">PUSPAGA</h1>
                        <a href="https://psikolog.clientku.com/" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button">Kunjungi</a>
                    </figcaption>
                </figure>
            </div>
            <div class="active-portal card-bidang card-portal-2 col-md-4 col-sm-12 col-12">
                <figure class="h-100 position-relative text-white">
                    <img src="{{asset('tlandingpage/asset/img/pemberdayaan.jpeg')}}" alt="">
                    <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
                        <h1 class="fw-bold fs-2">Pemberdayaan <br> Masyarakat</h1>
                        {{-- <p class="fs-5 text-white">Sistem Manajemen Perlindungan Anak Balikpapan</p> --}}
                        <a href="{{url('pemberdayaan')}}" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button">Kunjungi</a>
                    </figcaption>
                </figure>
            </div>

        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>