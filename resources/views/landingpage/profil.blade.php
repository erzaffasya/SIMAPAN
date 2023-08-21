<x-guest-layout>
    <section id="header-hero">
        <div class="container">
            <div class="header-title text-center mt-5">
                <h1 class="fs-1 fw-bold">PROFIL ANAK BALIKPAPAN</h1>
                <div class="mx-auto">
                    <p class="lead text-secondary mb-4">Mari Wujudkan Balikpapan Menuju Kota Layak Anak</p>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-5">
                    <img src="{{ asset('tlandingpage/asset/img/anak.png') }}" alt="" class="w-100">
                </div>
                <div class="col-6">
                    <h1 class="fs-2 fw-bold">JUMLAH ANAK SAAT INI <span
                            class="text-danger">{{ number_format(($jumlahAnak->laki_laki ?? 0) + ($jumlahAnak->perempuan ?? 0)) }}</span>
                    </h1>
                    <div class="d-flex">
                        <div class="mt-4 me-4">
                            <p class="text-secondary mb-0 fs-5">Anak Laki-Laki</p>
                            <p class="fw-bold fs-2">{{ number_format($jumlahAnak->laki_laki ?? 0) }}</p>
                        </div>
                        <div class="mt-4">
                            <p class="text-secondary mb-0 fs-5">Anak Perempuan</p>
                            <p class="fw-bold fs-2">{{ number_format($jumlahAnak->perempuan ?? 0) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pengurus-section">
        <div class="bg-reds bg-img-overlay item1-img py-5 mt-5">
            <div class="container">
                <div class="text-center">
                    <h1 class="fs-1 fw-bold text-white mb-4">INFORMASI KLUSTER ANAK</h1>
                </div>
                <div class="row">
                    <div class="col-2">
                        <a href="/kluster6" class="text-decoration-none">
                            <figure class="rounded overflow-hidden h-100 bg-white">
                                <img src="{{ asset('tlandingpage/asset/img/kluster-6.png') }}" alt=""
                                    class="w-100 px-5 py-4">
                                <figcaption class="bg-white px-3 py-2 text-center">
                                    <h1 class="mb-1 fs-5 text-dark">KELEMBAGAAN</h1>
                                    <p class="text-secondary mb-0">Kebijakan-kebijakan</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="/kluster1" class="text-decoration-none">
                            <figure class="rounded overflow-hidden h-100 bg-white">
                                <img src="{{ asset('tlandingpage/asset/img/kluster-1.png') }}" alt=""
                                    class="w-100 px-5 py-4">
                                <figcaption class="bg-white px-3 py-2 text-center">
                                    <h1 class="mb-1 fs-4 text-dark">KLUSTER 1</h1>
                                    <p class="text-secondary mb-0">Hak Sipil Kebebasan</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="/kluster2" class="text-decoration-none">
                            <figure class="rounded overflow-hidden h-100 bg-white">
                                <img src="{{ asset('tlandingpage/asset/img/kluster-2.png') }}" alt=""
                                    class="w-100 px-5 py-4">
                                <figcaption class="bg-white px-3 py-2 text-center">
                                    <h1 class="mb-1 fs-4 text-dark">KLUSTER 2</h1>
                                    <p class="text-secondary mb-0">Lingkungan Keluarga & Pengasuhan Alternatif</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="/kluster3" class="text-decoration-none">
                            <figure class="rounded overflow-hidden h-100 bg-white">
                                <img src="{{ asset('tlandingpage/asset/img/kluster-3.png') }}" alt=""
                                    class="w-100 px-5 py-4">
                                <figcaption class="bg-white px-3 py-2 text-center">
                                    <h1 class="mb-1 fs-4 text-dark">KLUSTER 3</h1>
                                    <p class="text-secondary mb-0">Kesehatan Dasar & Kesejahteraan</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="/kluster4" class="text-decoration-none">
                            <figure class="rounded overflow-hidden h-100 bg-white">
                                <img src="{{ asset('tlandingpage/asset/img/kluster-4.png') }}" alt=""
                                    class="w-100 px-5 py-4">
                                <figcaption class="bg-white px-3 py-2 text-center">
                                    <h1 class="mb-1 fs-4 text-dark">KLUSTER 4</h1>
                                    <p class="text-secondary mb-0">Pendidikan, Pemanfaatan Waktu Luang & kegiatan Budaya</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="/kluster5" class="text-decoration-none">
                            <figure class="rounded overflow-hidden h-100 bg-white">
                                <img src="{{ asset('tlandingpage/asset/img/kluster-5.png') }}" alt=""
                                    class="w-100 px-5 py-4">
                                <figcaption class="bg-white px-3 py-2 text-center">
                                    <h1 class="mb-1 fs-4 text-dark">KLUSTER 5</h1>
                                    <p class="text-secondary mb-0">Perlindungan Khusus</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="lembaga-section">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-6">
                    <img src="{{ asset('storage/img/kelembagaan/' . $kelembagaan->foto ?? null) }}" class="w-100"
                        height="370px" alt="">
                </div>
                <div class="col-6">
                    <h1 class="fs-1 fw-bold mb-3">{{ $kelembagaan->judul ?? null }}</h1>
                    <div class="fs-5 text-secondary lh-2">
                        {!! $kelembagaan->deskripsi ?? null !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="kegiatan-section">
        <div class="container py-5">
            <h1 class="fs-2 text-danger fw-bold mb-3 text-center text-capitalize">mewujudkan balikpapan menuju kota
                layak anak</h1>
            <div class="row g-0 gy-0">
                @foreach ($ForumKategoriGaleri as $item)
                    <div class="col-3">
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
