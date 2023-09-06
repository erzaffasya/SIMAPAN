<x-guest-layout>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 col-lg-4">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-1.png') }}" alt="" width="30%">
                        <figcaption class="ps-4">
                            <h1>KLUSTER 1</h1>
                            <p class="mb-0 fs-5 text-secondary">HAK SIPIL KEBEBASAN</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-10 col-lg-6">Hak sipil kebebasan anak adalah hak-hak asasi manusia yang melekat pada setiap anak,
                    yang bertujuan untuk melindungi dan menghormati martabat, kebebasan, dan kepentingan mereka.</div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 col-lg-4">
                    <h3 class="lh-lg text-success">Presentase anak yang mendapatkan Kutipan Akta Kelahiran & Kartu
                        Identitas Anak (KIA)</h3>
                </div>
                <div class="col-10 col-lg-6">
                    <canvas id="c1chart" style="height: 200px"></canvas>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="bg-greens bg-img-overlay item1-img pt-4 pb-5 mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <h4 class="text-center text-white mb-4 lh-md">UPAYA PERCEPATAN AKTA KELAHIRAN TERUTAMA BAGI ANAK
                            YANG MEMERLUKAN PERLINDUNGAN KHUSUS (AMPK)</h4>
                    </div>
                    <div class="col-10 mb-2 col-lg-3">
                        <a href="/kluster1" class="text-decoration-none">
                            <figure class="rounded overflow-hidden h-100 bg-white">
                                <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" alt=""
                                    class="w-100">
                                <figcaption class="bg-white px-3 py-2 text-center">
                                    <h5 class="mb-1 text-dark">KERJASAMA</h5>
                                    <p class="text-secondary mb-0">Seluruh rumah sakit di Balikpapan</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    <div class="col-10 mb-2 col-lg-3">
                        <figure class="rounded overflow-hidden h-100 bg-white">
                            <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" alt=""
                                class="w-100">
                            <figcaption class="bg-white px-3 py-2 text-center">
                                <h5 class="mb-1 text-dark">PENINGKATAN PELAYANAN</h5>
                                <p class="text-secondary mb-0">Layanan online menggunakan aplikasi SIPANTAI BALIKPAPAN
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-10 mb-2 col-lg-3">
                        <figure class="rounded overflow-hidden h-100 bg-white">
                            <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" alt=""
                                class="w-100">
                            <figcaption class="bg-white px-3 py-2 text-center">
                                <h5 class="mb-1 text-dark">KERJASAMA</h5>
                                <p class="text-secondary mb-0">Dinas Sosial dan Lembaga Masyarakat seperti Peksos dan
                                    PPATBM</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($artikel->has(0))
        <section>
            <div class="container py-5">
                <div class="row align-items-start justify-content-center">
                    <div class="col-11 text-center">
                        <h4 class="text-success mb-2">{{ $artikel[0]->judul }}</h4>
                        <p class="text-secondary fs-6 lh-lg">Lembaga layanan informasi anak yang terstandarisasi pusat
                            informasi sahabat anak (PISA) di Kota Balikpapan terdapata 1 Lembaga layanan yaitu
                            perpustakaan
                            daerah, yang ditetapkan melalui SK Walikota Balikpapan Nomor : 188.45-445/2022 dan telah
                            terstandarisasi kategori madya oleh kementerian PPA</p>
                    </div>
                    <div class="col-6">
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
                    <div class="col-4">
                        {!! $artikel[0]->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($artikel->has(1))
        <section>
            <div class="container py-5">
                <div class="row justify-content-center align-items-end">
                    <div class="col-5">
                        <h4 class="text-success mb-2">{{ $artikel[1]->judul }}</h4>
                        {!! $artikel[1]->deskripsi !!}
                    </div>
                    <div class="col-7">
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
        </section>

    @endif

    <section>
        <div class="container">
            <div class="rounded bg-success bg-img-overlay item1-img py-2 mb-5 mt-4">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="p-3 text-white text-center">
                            <p class="mb-0 fs-4 fw-bold">Forum anak sudah terbentuk di semua tingkatan yang terdiri
                                dari<br> 1 Forum Anak Kota Balikpapan, 6 Forum Anak Kecamatan dan 34 Forum Anak
                                Kelurahan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            const c1ctx = document.getElementById('c1chart');
            const akta_kelahiran = @json($akta_kelahiran);
            const kartu_identitas = @json($kartu_identitas);
            const tahun = @json($tahun);

            new Chart(c1ctx, {
                type: 'bar',
                data: {
                    labels: tahun,
                    datasets: [{
                            label: 'Kutipan Akta Kelahiran',
                            data: akta_kelahiran,
                            backgroundColor: 'rgba(62, 201, 62, 0.5)', // Warna untuk label 1
                            borderWidth: 1
                        },
                        {
                            label: 'Kartu Identitas Anak (KIA)',
                            data: kartu_identitas,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna untuk label 2
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
            // END CHART KLUSTER 1
        </script>
    @endpush
</x-guest-layout>
