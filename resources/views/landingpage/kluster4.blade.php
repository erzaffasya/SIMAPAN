<x-guest-layout>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 mb-2 col-lg-4">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-4.png') }}" alt="" width="40%">
                        <figcaption class="ps-4">
                            <h1>KLUSTER 4</h1>
                            <p class="mb-0 fs-5 text-secondary">Pendidikan, Pemanfaatan Waktu Luang & kegiatan Budaya</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-10 col-lg-6 mb-4">Upaya untuk meningkatkan pengetahuan, keterampilan, dan kesadaran masyarakat tentang
                    perlindungan perempuan dan anak, serta memperkuat peran positif keluarga dan masyarakat</div>
            </div>
        </div>
    </section>
    @if ($artikel->has(0))
        <section>
            <div class="container py-5">
                <div class="row align-items-start justify-content-center">
                    <div class="col-10 col-lg-11 text-center">
                        <h4 class="text-primary mb-2">{{ $artikel[0]->judul }}</h4>
                        <p class="text-secondary fs-6 lh-lg">Upaya-upaya yang telah dilakukan untuk menangani anak putus
                            sekolah dan mendukung kebijakan Wajib Belajar 12 Tahun yaitu :</p>
                    </div>
                    <div class="col-10 col-lg-4">
                        <div class="slide-1-view">
                            @forelse ($artikel[0]->galeri as $item)
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
                    <div class="col-10 col-lg-8">
                        {!! $artikel[0]->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>

    @endif

    {{-- <section>
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 col-lg-4">
                    <h3 class="text-primary">Satuan Pendidikan Ramah Anak (SRA)</h3>
                    <p class="lh-lg text-secondary">Presentase sekolah ramah anak dalam berbagai tingkat</p>
                </div>
            </div>
        </div>
    </section> --}}
    @if ($artikel->has(1))
        <section>
            <div class="container py-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-10 col-lg-10">
                        <h4 class="text-primary mb-4">{{ $artikel[1]->judul }}</h4>
                        <p class="text-secondary fs-6 lh-lg">{!! $artikel[1]->deskripsi !!}
                        </p>
                    </div>
                    <div class="col-10 col-lg-6">
                        <div class="slide-1-view">
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
                    <div class="col-10 col-lg-6">
                        <canvas id="c4chart" style="height: 200px"></canvas>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($artikel->has(2))
        <section>
            <div class="container py-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-10 col-lg-6">
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
                    <div class="col-10 col-lg-4">
                        <h4 class="text-primary mb-4">{{ $artikel[2]->judul }}</h4>
                        <p class="text-secondary fs-6 lh-lg">Di Kota Balikpapan telah terbentuk 3 Rumah Ibadah Ramah
                            Anak
                            yang diresmikan oleh Wali Kota Balikpapan yaitu :</p>
                        {!! $artikel[2]->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
    @endif
    @push('scripts')
        <script>
            const c4ctx = document.getElementById('c4chart');
            const c4data2022 = @json($sekolah_ramah_anak); // Contoh data dua label untuk tahun 2022
            const tahun = @json($tahun);
            new Chart(c4ctx, {
                type: 'bar',
                data: {
                    labels: tahun,
                    datasets: [{
                            label: 'TK/RA/PAUD',
                            data: [c4data2022[0]],
                            backgroundColor: 'rgba(62, 201, 62, 0.5)', // Warna untuk label 1
                            borderWidth: 1
                        },
                        {
                            label: 'SD/MI',
                            data: [c4data2022[1]],
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna untuk label 2
                            borderWidth: 1
                        },
                        {
                            label: 'SMP/MTS',
                            data: [c4data2022[2]],
                            backgroundColor: 'rgba(50, 168, 133, 0.5)', // Warna untuk label 3
                            borderWidth: 1
                        },
                        {
                            label: 'SMA/SMK/MA',
                            data: [c4data2022[3]],
                            backgroundColor: 'rgba(15, 61, 122, 0.5)', // Warna untuk label 4
                            borderWidth: 1
                        },
                        {
                            label: 'SLB',
                            data: [c4data2022[4]],
                            backgroundColor: 'rgba(47, 49, 186, 0.5)', // Warna untuk label 5
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
</x-guest-layout>
