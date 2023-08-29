<x-guest-layout>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-4">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-5.png') }}" alt="" width="30%">
                        <figcaption class="ps-4">
                            <h1>KLUSTER 5</h1>
                            <p class="mb-0 fs-5 text-secondary">Perlindungan Khusus</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6">Hak sipil kebebasan anak adalah hak-hak asasi manusia yang melekat pada setiap anak,
                    yang bertujuan untuk melindungi dan menghormati martabat, kebebasan, dan kepentingan mereka.</div>
            </div>
        </div>
    </section>
    @if ($artikel->has(0))
        <section>
            <div class="container py-5">
                <div class="row align-items-start justify-content-center">
                    <div class="col-11 text-center">
                        <h4 class="text-success mb-2">{{ $artikel[0]->judul }}</h4>
                        <p class="text-secondary fs-6 lh-lg">UPTD PPA Kota Balikpapan terbentuk dengan Peraturan Wali
                            Kota Balikpapan Nomor 2 Tahun 2019 tentang Tupoksi UPTD PPA</p>
                    </div>
                    <div class="col-6">
                        <div class="slide-2-view">
                            @forelse ($artikel[0]->galeri as $item)
                                <figure class="mb-0 px-2">
                                    <img class="rounded" style="object-fit: cover;"
                                        src="{{ asset("storage/img/forum_galeri/$item->id_kategori_galeri/$item->foto") }}"
                                        width="100%" height="300px">
                                </figure>
                            @empty
                                <figure class="mb-0 px-2">
                                    <img class="rounded" style="object-fit: cover;"
                                        src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" width="100%"
                                        height="350px">
                                </figure>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-4">
                        {!! $artikel[0]->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($artikel->has(1))
        <section>
            <div class="bg-greens bg-img-overlay item1-img py-4">
                <div class="container py-5">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-6">
                            <h4 class="text-white mb-4 lh-lg">{{ $artikel[1]->judul }}</h4>
                            <p class="text-white fs-5 lh-lg">{{ $artikel[1]->deskripsi }}</p>
                        </div>
                        <div class="col-6">
                            <div class="slide-2-view">
                                @forelse ($artikel[1]->galeri as $item)
                                    <figure class="mb-0 px-2">
                                        <img class="rounded" style="object-fit: cover;"
                                            src="{{ asset("storage/img/forum_galeri/$item->id_kategori_galeri/$item->foto") }}"
                                            width="100%" height="350px">
                                    </figure>
                                @empty
                                    <figure class="mb-0 px-2">
                                        <img class="rounded" style="object-fit: cover;"
                                            src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" width="100%"
                                            height="350px">
                                    </figure>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($artikel->has(2))
        <section>
            <div class="container py-5">
                <div class="row align-items-start justify-content-center">
                    <div class="col-11 text-center">
                    </div>
                    <div class="col-3">
                        <div class="slide-1-view">
                            @forelse ($artikel[2]->galeri as $item)
                                <figure class="mb-0">
                                    <img class="rounded"
                                        src="{{ asset("storage/img/forum_galeri/$item->id_kategori_galeri/$item->foto") }}"
                                        width="100%" height="350px">
                                </figure>
                            @empty
                                <figure class="mb-0 px-2">
                                    <img class="rounded" style="object-fit: cover;"
                                        src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" width="100%"
                                        height="350px">
                                </figure>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-7">
                        <h5 class="text-success mb-3 lh-lg">{{ $artikel[2]->judul }}</h5>
                        {!! $artikel[2]->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($artikel->has(3))
        <section>
            <div class="container py-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-6">
                        <div class="slide-1-view">
                            @forelse ($artikel[3]->galeri as $item)
                                <figure class="mb-0 px-2">
                                    <img class="rounded" style="object-fit: cover;"
                                        src="{{ asset("storage/img/forum_galeri/$item->id_kategori_galeri/$item->foto") }}"
                                        width="100%" height="350px">
                                </figure>
                            @empty
                                <figure class="mb-0 px-2">
                                    <img class="rounded" style="object-fit: cover;"
                                        src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" width="100%"
                                        height="350px">
                                </figure>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="text-success mb-4">{{ $artikel[3]->judul }}</h4>
                        {!! $artikel[3]->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
    @endif



</x-guest-layout>
