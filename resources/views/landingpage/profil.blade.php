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
                <div class="col-12 col-lg-5">
                    <img src="{{ asset('tlandingpage/asset/img/anak.png') }}" alt="" class="w-100">
                </div>
                <div class="col-12 col-lg-6">
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
                    <h1 class="fs-1 fw-bold text-white mb-4">INDIKATOR BALIKPAPAN MENUJU KOTA LAYAK ANAK</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 col-lg-2 mb-2">
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
                    <div class="col-6 col-lg-2 mb-2">
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
                    <div class="col-6 col-lg-2 mb-2">
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
                    <div class="col-6 col-lg-2 mb-2">
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
                    <div class="col-6 col-lg-2 mb-2">
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
                    <div class="col-6 col-lg-2 mb-2">
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
                <div class="col-12 col-lg-6">
                    <img src="{{ asset('storage/img/kelembagaan/' . $kelembagaan->foto) }}" class="w-100"
                        height="370px" alt="">
                </div>
                <div class="col-12 col-lg-6">
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
    {{-- <section id="chart-section">
        <div class="container py-5">
            <h1 class="fs-2 fw-bold mb-3 text-center">Statistik Anak Balikpapan</h1>
            <div class="row">
                <!-- Bar Chart Canvas -->
                <div class="col-lg-6 mb-4">
                    <canvas id="barChart" width="400" height="400"></canvas>
                </div>
                <!-- Donut Chart Canvas -->
                <div class="col-lg-6 mb-4">
                    <canvas id="donutChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="chart-section">
        <div class="container py-5">
            <h1 class="fs-2 fw-bold mb-5 text-center text-uppercase">Statistik Kasus</h1>
            <div class="row">
                <!-- Bar Chart Canvas for KDRT/NON KDRT -->
                <div class="col-lg-6 mb-4">
                    <h5>Grafik KDRT/NON KDRT</h5>
                    <canvas id="barChartKDRT" width="400" height="150"></canvas>
                </div>
                <!-- Bar Chart Canvas for Age Groups -->
                <div class="col-lg-6 mb-4">
                    <h5>Grafik Total Kasus</h5>
                    <canvas id="barChartAge" width="400" height="150"></canvas>
                </div>
            </div>
            <div class="row">
                <!-- Doughnut Chart Canvas for Types of Violence -->
                <div class="col-lg-3 mb-4">
                    <h5>Grafik Jenis Kekerasan</h5>
                    <canvas id="donutChartType"></canvas>
                </div>
                <!-- Doughnut Chart Canvas for Types of Services -->
                <div class="col-lg-3 mb-4">
                    <h5>Grafik Jenis Layanan</h5>
                    <canvas id="donutChartService"></canvas>
                </div>
                <!-- Doughnut Chart Canvas for District Locations -->
                <div class="col-lg-3 mb-4">
                    <h5>Grafik Perkecamatan</h5>
                    <canvas id="donutChartDistrict"></canvas>
                </div>
                <!-- Doughnut Chart Canvas for Village Locations -->
                <div class="col-lg-3 mb-4">
                    <h5>Grafik Perkelurahan</h5>
                    <canvas id="donutChartVillage"></canvas>
                </div>
                <div class="col-lg-12 mb-4">
                    <h5>Grafik Pengaduan</h5>
                    <canvas id="lineChartCases" height="80"></canvas>
                </div>
            </div>
        </div>
    </section>
    
    @push('scripts')
        <script>
            // Bar Chart for KDRT / NON KDRT Cases
            var ctxBarKDRT = document.getElementById('barChartKDRT').getContext('2d');
            var barChartKDRT = new Chart(ctxBarKDRT, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [
                        {
                            label: 'KDRT',
                            data: [12, 19, 3, 5, 2, 3, 9, 6, 7, 8, 5, 1],
                            backgroundColor: 'rgba(54, 162, 235, 0.5)'
                        },
                        {
                            label: 'NON KDRT',
                            data: [7, 11, 5, 8, 3, 7, 2, 6, 9, 4, 6, 2],
                            backgroundColor: 'rgba(255, 206, 86, 0.5)'
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Bar Chart for Cases by Age Group
            var ctxBarAge = document.getElementById('barChartAge').getContext('2d');
            var barChartAge = new Chart(ctxBarAge, {
                type: 'bar',
                data: {
                    labels: ['Dibawah 18 Tahun', 'Diatas 18 Tahun'],
                    datasets: [
                        {
                            label: 'Kasus per Age Group',
                            data: [33, 67],
                            backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)']
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Doughnut Charts setup
            var doughnutOptions = {
                type: 'doughnut',
            };

            // Doughnut Chart for Types of Violence
            var ctxDonutType = document.getElementById('donutChartType').getContext('2d');
            var donutChartType = new Chart(ctxDonutType, Object.assign({}, doughnutOptions, {
                data: {
                    labels: ['Fisik', 'Psikis', 'Seksual', 'Eksploitasi', 'Perdagangan Orang', 'Penelantaran', 'Lainnya'],
                    datasets: [{
                        data: [12, 19, 3, 5, 2, 3, 4],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(201, 203, 207, 0.5)'
                        ]
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            }));

            // Doughnut Chart for Types of Services
            var ctxDonutService = document.getElementById('donutChartService').getContext('2d');
            var donutChartService = new Chart(ctxDonutService, Object.assign({}, doughnutOptions, {
                data: {
                    labels: ['Layanan Pengaduan', 'Layanan Penjangkauan', 'Layanan Pendampingan Psikolog', 'Layanan Pendampingan Hukum', 'Layanan Pendampingan Medis', 'Layanan Mediasi', 'Layanan Penampungan Sementara'],
                    datasets: [{
                        data: [20, 25, 15, 10, 5, 13, 12],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(201, 203, 207, 0.5)'
                        ]
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            }));

            // Doughnut Chart for District Locations
            var ctxDonutDistrict = document.getElementById('donutChartDistrict').getContext('2d');
            var donutChartDistrict = new Chart(ctxDonutDistrict, Object.assign({}, doughnutOptions, {
                data: {
                    labels: ['Kecamatan A', 'Kecamatan B', 'Kecamatan C', 'Kecamatan D'],
                    datasets: [{
                        data: [10, 20, 30, 40],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ]
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            }));

            // Doughnut Chart for Village Locations
            var ctxDonutVillage = document.getElementById('donutChartVillage').getContext('2d');
            var donutChartVillage = new Chart(ctxDonutVillage, Object.assign({}, doughnutOptions, {
                data: {
                    labels: ['Kelurahan 1', 'Kelurahan 2', 'Kelurahan 3', 'Kelurahan 4'],
                    datasets: [{
                        data: [5, 15, 25, 55],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ]
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            }));

            var ctxLineChart = document.getElementById('lineChartCases').getContext('2d');
            var lineChartCases = new Chart(ctxLineChart, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Number of Cases',
                        data: [20, 30, 45, 50, 65, 60, 70, 80, 75, 90, 95, 100], // Replace with actual data
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    @endpush

</x-guest-layout>
