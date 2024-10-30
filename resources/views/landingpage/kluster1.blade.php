<x-guest-layout>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 col-lg-4">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-1.png') }}" alt="" width="30%">
                        <figcaption class="ps-4">
                            <h1>{{ $kluster->title }}</h1>
                            <p class="mb-0 fs-5 text-secondary">{{ $kluster->subtitle }}</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-10 col-lg-6">{!! $kluster->description !!}</div>
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
        <div class="container py-5">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="display-6 fw-bold mb-3">Artikel Kluster {{ $kluster->kluster }}</h1>
            </div>

            @include('components.artikel-kluster')


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
