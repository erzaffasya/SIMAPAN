<x-guest-layout>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 mb-2 col-lg-4">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-2.png') }}" alt="" width="50%">
                        <figcaption class="ps-4">
                            <h1>KLUSTER 2</h1>
                            <p class="mb-0 fs-5 text-secondary">Lingkungan Keluarga & Pengasuhan Alternatif</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-10 col-lg-6 fs-5">upaya untuk menciptakan lingkungan keluarga yang aman, mendukung, dan berkualitas
                    bagi perkembangan optimal anak-anak.</div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 col-lg-4">
                    <h3 class="lh-lg text-danger">Data PUSPAGA HARAPAN tahun 2017-2022</h3>
                    <p class="lh-lg text-secondary">Penguatan Kapasitas Lembaga Konsultasi Penyedia Layanan Pengasuhan
                        Anakk bagi Orang Tua/Keluarga</p>
                </div>
                <div class="col-10 col-lg-6">
                    <canvas id="c2chart" style="height: 200px"></canvas>
                </div>
            </div>
        </div>
    </section>
    @if ($artikel->has(0))
        <section>
            <div class="container py-5">
                <div class="row justify-content-center align-items-center">
                    <div class="col-10 col-lg-5">
                        <h4 class="text-danger mb-2">{{ $artikel[0]->judul }}</h4>
                        {!! $artikel[0]->deskripsi !!}
                    </div>
                    <div class="col-10 col-lg-7">
                        <div class="slide-2-view">
                            @forelse ($artikel[0]->galeri as $item)
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
    @if ($artikel->has(1))
        <section>
            <div class="bg-reds bg-img-overlay item1-img pt-4 pb-4 mt-5">
                <div class="container">
                    <div class="text-center">
                        <h4 class="text-white mb-4 lh-md">{{ $artikel[1]->judul }}</h4>
                    </div>
                    <div class="slide-4-view row">
                        @forelse ($artikel[1]->galeri as $item)
                            <div class="mx-2 col h-100">
                                <figure class="rounded overflow-hidden h-100 mb-0">
                                    <img src="{{ asset("storage/img/forum_galeri/$item->id_kategori_galeri/$item->foto") }}"
                                        alt="" class="w-100">
                                    <figcaption class="px-3 py-2 text-center">
                                        {{-- <p class="mb-1 text-white fs-5">RBA di Kelurahan</p> --}}
                                    </figcaption>
                                </figure>
                            </div>
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
        </section>
    @endif
    @if ($artikel->has(2))
        <section>
            <div class="container py-5">
                <div class="row align-items-start justify-content-center">
                    <div class="col-11 col-lg-11 text-center">
                        <h4 class="text-danger mb-2">{{ $artikel[2]->judul }}</h4>
                        <p class="text-secondary fs-6 lh-lg">{!! $artikel[2]->deskripsi !!}</p>
                    </div>
                    <div class="col-11 col-lg-10">
                        <div class="slide-2-view">
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

    @if ($artikel->has(3))
        <section>
            <div class="container py-5">
                <div class="row align-items-start justify-content-center">
                    <div class="col-11 text-center">
                        <h4 class="text-danger mb-2">{{ $artikel[3]->judul }}</h4>
                    </div>
                    <div class="col-11 col-lg-4">
                        <div class="slide-1-view">
                            @forelse ($artikel[3]->galeri as $item)
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
                    <div class="col-11 col-lg-6">
                        {!! $artikel[3]->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="bg-reds bg-img-overlay item1-img py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10 col-lg-4">
                        <p class="fs-4 text-white fs-6 lh-lg">Terdapat 9 Program</p>
                        <h3 class="text-white mb-4 lh-lg">Fokus Pembangunan Peningkatan Kualitas Sumber Daya Manusia
                            yang Berkualitas dan Berdaya Saing</h3>
                    </div>
                    <div class="col-10 col-lg-8">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg1">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg1" aria-expanded="false"
                                        aria-controls="cpg1">
                                        Program Pengelolaan Pendidikan
                                    </button>
                                </p>
                                <div id="cpg1" class="accordion-collapse collapse" aria-labelledby="pg1"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg2">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg2" aria-expanded="false"
                                        aria-controls="cpg2">
                                        Program Peningkatan Kapasitas Sumber Daya Manusia Kesehatan
                                    </button>
                                </p>
                                <div id="cpg2" class="accordion-collapse collapse" aria-labelledby="pg2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg3">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg3" aria-expanded="false"
                                        aria-controls="cpg3">
                                        Program Pemberdayaan Masyarakat Bidang Kesehatan
                                    </button>
                                </p>
                                <div id="cpg3" class="accordion-collapse collapse" aria-labelledby="pg3"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg4">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg4" aria-expanded="false"
                                        aria-controls="cpg4">
                                        Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat
                                    </button>
                                </p>
                                <div id="cpg4" class="accordion-collapse collapse" aria-labelledby="pg4"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg5">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg5" aria-expanded="false"
                                        aria-controls="cpg5">
                                        Program Pemberdayaan dan Peningkatan Keluarga Sejahtera
                                    </button>
                                </p>
                                <div id="cpg5" class="accordion-collapse collapse" aria-labelledby="pg5"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg6">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg6" aria-expanded="false"
                                        aria-controls="cpg6">
                                        Program Pelatihan Kerja dan Produktivitas Tenaga Kerja
                                    </button>
                                </p>
                                <div id="cpg6" class="accordion-collapse collapse" aria-labelledby="pg6"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg7">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg7" aria-expanded="false"
                                        aria-controls="cpg7">
                                        Program Pembinaan Perpustakaan
                                    </button>
                                </p>
                                <div id="cpg7" class="accordion-collapse collapse" aria-labelledby="pg7"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg8">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg8" aria-expanded="false"
                                        aria-controls="cpg8">
                                        Program Pendidik dan Tenaga Kependidikan
                                    </button>
                                </p>
                                <div id="cpg8" class="accordion-collapse collapse" aria-labelledby="pg8"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <p class="accordion-header" id="pg9">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#cpg9" aria-expanded="false"
                                        aria-controls="cpg9">
                                        Program Pengelolaan Pendidikan
                                    </button>
                                </p>
                                <div id="cpg9" class="accordion-collapse collapse" aria-labelledby="pg9"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada
                                        lacus ex, sit amet
                                        blandit leo lobortis eget.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            const c2ctx = document.getElementById('c2chart');

            const indoor = @json($indoor);
            const outdoor = @json($outdoor);
            const online = @json($online);
            const tahun = @json($tahun);
            new Chart(c2ctx, {
                type: 'bar',
                data: {
                    labels: tahun,
                    datasets: [{
                            label: 'Layanan Indoor',
                            data: indoor,
                            backgroundColor: 'rgba(220, 159, 53, 0.7)', // Warna untuk label 2
                            borderWidth: 1
                        },
                        {
                            label: 'Layanan Outdoor/Sosialisasi',
                            data: outdoor,
                            backgroundColor: 'rgba(220, 53, 69, 0.7)', // Warna untuk label 1
                            borderWidth: 1
                        },
                        {
                            label: 'Layanan Online',
                            data: online,
                            backgroundColor: 'rgba(247, 104, 52, 0.7)', // Warna untuk label 2
                            borderWidth: 1
                        },
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value + 'x';
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
</x-guest-layout>
