<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset('tlandingpage/asset/img/logo-1.png')}}" height="30" class="d-inline-block align-text-top">
            <img src="{{asset('tlandingpage/asset/img/logo-2.png')}}" height="30" class="mx-2 d-inline-block align-text-top">
            <img src="{{asset('tlandingpage/asset/img/logo-3.png')}}" height="30" class="d-inline-block align-text-top">
            <img src="{{asset('tlandingpage/asset/img/logo-4.jpg')}}" height="30" class="d-inline-block align-text-top">
            <span class="fw-bolder ms-2">DP3AKB</span>
            <span class="ms-2">| Balikpapan</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/simapan')}}">Kegiatan PA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/forum')}}">Forum Anak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/profil')}}">Profil Anak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/simapan#about-program')}}">Tentang</a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{url('/simapan#faq-section')}}" class="nav-link" href="#faq-section">FaQ</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/simapan#aspirasi-section')}}">Aspirasi</a>
                </li>
            </ul>
            {{-- <a href="#" class="btn btn-primary" type="submit">Masuk</a> --}}
        </div>
    </div>
</nav>