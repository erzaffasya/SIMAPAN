<x-guest-layout>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-4">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-3.png') }}" alt="" width="30%">
                        <figcaption class="ps-4">
                            <h1>KLUSTER 3</h1>
                            <p class="mb-0 fs-5 text-secondary">Kesehatan Dasar & Kesejahteraan</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6 fs-5">Usaha untuk meningkatkan kondisi kesehatan dan kesejahteraan fisik, mental, dan
                    sosial perempuan, anak-anak, keluarga, dan masyarakat secara keseluruhan</div>
            </div>
        </div>
    </section>
    @if ($artikel->has(0))
        <section>
            <div class="container py-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-4">
                        <h4 class="text-success mb-4">{{ $artikel[0]->judul }}</h4>
                        <p class="text-secondary fs-6 lh-lg">{!! $artikel[0]->deskripsi !!}</p>
                    </div>
                    <div class="col-7">
                        <div class="slide-2-view">
                            @forelse ($artikel[0]->galeri as $item)
                                <figure class="mb-0 px-2">
                                    <img class="rounded" style="object-fit: cover;"
                                        src="{{ asset("storage/img/forum_galeri/$item->id_kategori_galeri/$item->foto") }}"
                                        width="100%" height="250px">
                                </figure>
                            @empty
                                <figure class="mb-0 px-2">
                                    <img class="rounded" style="object-fit: cover;" src="{{ asset('') }}"
                                        width="100%" height="250px">
                                </figure>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($artikel->has(1))
        <section>
            <div class="container py-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-7">
                        <div class="slide-2-view">
                            @forelse ($artikel[1]->galeri as $item)
                                <figure class="mb-0 px-2">
                                    <img class="rounded" style="object-fit: cover;"
                                        src="{{ asset("storage/img/forum_galeri/$item->id_kategori_galeri/$item->foto") }}"
                                        width="100%" height="250px">
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
                        <h4 class="text-success mb-4">{{ $artikel[1]->judul }}</h4>
                        <p class="text-secondary fs-6 lh-lg">{!! $artikel[1]->deskripsi !!}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($artikel->has(2))
        <section>
            <div class="container py-5">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6">
                        <h4 class="text-success mb-2">{{ $artikel[2]->judul }}</h4>
                        {!! $artikel[2]->deskripsi !!}
                    </div>
                    <div class="col-4">
                        <div class="slide-1-view">
                            @forelse ($artikel[2]->galeri as $item)
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
        </section>
    @endif

    <section>
        <div class="bg-greens bg-img-overlay item1-img py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10 text-center">
                        {{-- <p class="fs-4 text-white fs-6 lh-lg">Terdapat 9 Program</p> --}}
                        <h2 class="text-white mb-2 lh-lg">Program Prioritas</h2>
                    </div>
                    <div class="col-8">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#cpg1" aria-expanded="false" aria-controls="cpg1">
                                        Pembangunan Unit Sekolah Baru (USB)
                                    </button>
                                </p>
                                <div id="cpg1" class="accordion-collapse collapse" aria-labelledby="pg1"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lanjutan pembangunan SD dan SMP di Kelurahan Graha Indah Kecamatan Balikpapan
                                            Utara</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#cpg2" aria-expanded="false" aria-controls="cpg2">
                                        Pengadaan Perlengkapan Siswa
                                    </button>
                                </p>
                                <div id="cpg2" class="accordion-collapse collapse" aria-labelledby="pg2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Dengan melibatkan UMKM dalam penyediaan Batik Balikpapan</p>
                                        <p>Kelas 1 SD Negeri dan Swasta</p>
                                        <p>Kelas 7 SMP Negeri dan Swasta</p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">SD, Besaran Rp. 300.000 per Stel dengan jumlah
                                                Siswa : 12.558</li>
                                            <li class="list-group-item">SMP, Besaran Rp. 300.000 per Stel Jumlah Siswa
                                                : 11.294</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg3">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg3" aria-expanded="false"
                                        aria-controls="cpg3">
                                        Subsidi Uang Sekolah (SPP) bagi siswa di sekolah swasta (SD & SMP)
                                    </button>
                                </p>
                                <div id="cpg3" class="accordion-collapse collapse" aria-labelledby="pg3"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Memberikan subsidi uang sekolah bagi siswa yang bersekolah di sekolah swasta
                                        </p>
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item">SD, besaran subsidi Rp. 75.000/siswa/bulan.
                                                Dengan Jumlah Siswa : 19.465 anak</li>
                                            <li class="list-group-item">SMP, besaran subsidi Rp. 110.000/siswa/kelas.
                                                Jumlah siswa : 13.153 anak</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg4">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg4" aria-expanded="false"
                                        aria-controls="cpg4">
                                        Pengelolaan Jaminan Kesehatan Masyarakat
                                    </button>
                                </p>
                                <div id="cpg4" class="accordion-collapse collapse" aria-labelledby="pg4"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Subsidi Iuran BPJS bagi peserta pekerja bukan penerima upah (PBPU) dan peserta
                                        bukan pekerja sebanyak 19 ribu jiwa
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
