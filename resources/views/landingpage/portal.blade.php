<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{asset('tlandingpage/asset/css/design.css')}}">

    <title>Portal DP3AKB</title>
</head>

<body>
    <main>
        <section class="nav-top">
            <figure class="mb-0 bg-white d-flex flex-wrap justify-content-center align-items-center px-4 py-2">
                <div class="me-2">
                    <img src="{{asset('tlandingpage/asset/img/logo-1.png')}}" alt="">
                    <img src="{{asset('tlandingpage/asset/img/logo-2.png')}}" alt="">
                    <img src="{{asset('tlandingpage/asset/img/logo-3.png')}}" alt="">
                </div>
                <figcaption class="fw-bold fs-5">DP3AKB | Dinas Perlindungan Pemberdayaan Perempuan Anak Keluarga Berencana</figcaption>
            </figure>
        </section>
        <section class="nav-top">
            <figure class="mb-0 bg-white d-flex flex-wrap justify-content-center align-items-center px-4 py-2">
                <div class="me-2">
                    <img src="{{asset('tlandingpage/asset/img/logo-4.jpg')}}" alt="">
                </div>
                <figcaption class="fw-bold fs-5">Strategi Peningkatan Peran Serta Masyarakat Dalam Mendukung Kota Balikpapan Menuju Kota Layak Anak</figcaption>
            </figure>
        </section>
        <div id="portal-1" class="row gx-0 align-items-md-stretch h-100">
            <div class="card-bidang card-portal-1 col-md-3 col-sm-6 col-12">
                <figure class="h-100 position-relative text-white">
                    <img src="{{asset('tlandingpage/asset/img/p1-1.jpg')}}" alt="">
                    <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
                        <h1>Bidang PA</h1>
                        <p class="fs-5">Perlindungan Anak</p>
                        <a href="{{url('/portal')}}" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button" disabled>Kunjungi</a>
                    </figcaption>
                </figure>
            </div>
            <div class="card-bidang card-portal-1 col-md-3 col-sm-6 col-12">
                <figure class="h-100 position-relative text-white">
                    <img src="{{asset('tlandingpage/asset/img/p1-2.jpg')}}" alt="">
                    <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
                        <h1>Bidang P3</h1>
                        <p class="fs-5">Pemberdayaan dan Perlindungan Perempuan</p>
                        <a href="#" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button" disabled>
                            <i class="fa-solid fa-lock"></i>    
                            <span class="ms-2">Kunjungi</span>
                        </a>
                    </figcaption>
                </figure>
            </div>
            <div class="card-bidang card-portal-1 col-md-3 col-sm-6 col-12">
                <figure class="h-100 position-relative text-white">
                    <img src="{{asset('tlandingpage/asset/img/p1-3.jpg')}}" alt="">
                    <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
                        <h1>Bidang KK</h1>
                        <p class="fs-5">Ketahanan Keluarga</p>
                        <a href="#" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button" disabled>
                            <i class="fa-solid fa-lock"></i>    
                            <span class="ms-2">Kunjungi</span>
                        </a>
                    </figcaption>
                </figure>
            </div>
            <div class="card-bidang card-portal-1 col-md-3 col-sm-6 col-12">
                <figure class="h-100 position-relative text-white">
                    <img src="{{asset('tlandingpage/asset/img/p1-4.jpg')}}" alt="">
                    <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
                        <h1>Bidang KB</h1>
                        <p class="fs-5">Keluarga Berencana</p>
                        <a href="#" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button" disabled>
                            <i class="fa-solid fa-lock"></i>    
                            <span class="ms-2">Kunjungi</span>
                        </a>
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