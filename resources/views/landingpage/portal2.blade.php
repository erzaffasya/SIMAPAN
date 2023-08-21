<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('tlandingpage/asset/css/design.css')}}">

    <title>Portal DP3AKB</title>
</head>

<body>
  <main>
    <section class="nav-top">
      <figure class="mb-0 bg-white d-flex align-items-center px-4 py-2">
        <div class="me-2">
          <img src="{{asset('tlandingpage/asset/img/logo-1.png')}}" alt="">
          <img src="{{asset('tlandingpage/asset/img/logo-2.png')}}" alt="">
          <img src="{{asset('tlandingpage/asset/img/logo-3.png')}}" alt="">
          <img src="{{asset('tlandingpage/asset/img/logo-simapan.png')}}" alt="">
        </div>
        <figcaption class="fw-bold fs-5">SISTEM MANAJEMEN PERLINDUNGAN ANAK</figcaption>
      </figure>
    </section>
    <div id="portal-1" class="row gx-0 align-items-md-stretch h-100">
      <div class="card-bidang card-portal-2 col-md-4">
        <figure class="h-100 position-relative text-white">
          <img src="{{asset('tlandingpage/asset/img/p2-1.jpg')}}" alt="">
          <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
            <h1 class="fw-bold display-6">PROFIL ANAK BALIKPAPAN</h1>
            <a href="{{url('profil')}}" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button">Kunjungi</a>
          </figcaption>
        </figure>
      </div>
      <div class="card-bidang card-portal-2 col-md-4">
        <figure class="h-100 position-relative text-white">
          <img src="{{asset('tlandingpage/asset/img/p2-2.jpg')}}" alt="">
          <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
            <h1 class="fw-bold display-6">FORUM ANAK BALIKPAPAN</h1>
            <a href="{{url('forum')}}" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button">Kunjungi</a>
          </figcaption>
        </figure>
      </div>
      <div class="card-bidang card-portal-2 col-md-4">
        <figure class="h-100 position-relative text-white">
          <img src="{{asset('tlandingpage/asset/img/p2-3.jpg')}}" alt="">
          <figcaption class="p-4 d-flex flex-column justify-content-end text-center">
            <h1 class="fw-bold fs-2">KEGIATAN PERLINDUNGAN ANAK BALIKPAPAN</h1>
            {{-- <p class="fs-5 text-white">Sistem Manajemen Perlindungan Anak Balikpapan</p> --}}
            <a href="{{url('simapan')}}" class="mt-3 btn btn-lg py-2 rounded-2 btn-outline-light" type="button">Kunjungi</a>
          </figcaption>
        </figure>
      </div>
    </div>
  </main>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>