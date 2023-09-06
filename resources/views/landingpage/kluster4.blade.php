<x-guest-layout>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-4">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-4.png') }}" alt="" width="40%">
                        <figcaption class="ps-4">
                            <h1>KLUSTER 4</h1>
                            <p class="mb-0 fs-5 text-secondary">Pendidikan, Pemanfaatan Waktu Luang & kegiatan Budaya</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-6">Upaya untuk meningkatkan pengetahuan, keterampilan, dan kesadaran masyarakat tentang
                    perlindungan perempuan dan anak, serta memperkuat peran positif keluarga dan masyarakat</div>
            </div>
        </div>
    </section>

    @php
        $countartikel = 0;
    @endphp
    @foreach ($kluster->artikel ?? [] as $artikel)
        @php
            if ($artikel->jenis == 'A') {
                $countartikel = $countartikel + 1;
            }
        @endphp
        <section>
            <div class="container py-5">
                <div class="row align-items-start justify-content-center">
                    <div class="col-11 text-center order-1">
                        <h4 class="text-success mb-2">{{ $artikel->title }}</h4>
                        <p class="text-secondary fs-6 lh-lg">{{ $artikel->subtitle }}</p>
                    </div>
                    <div class="col-6 {{ $countartikel % 2 ? 'order-2' : 'order-3' }}">
                        <div class="slide-1-view">
                            @forelse ($artikel->detail as $item)
                                <figure class="mb-0">
                                    <img class="rounded"
                                        src="{{ asset("storage/img/artikel_kluster/$kluster->kluster/$item->foto") }}"
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
                    <div class="col-4 {{ $countartikel % 2 ? 'order-3' : 'order-2' }}">
                        {!! $artikel->description !!}
                    </div>
                </div>
            </div>
        </section>
    @endforeach

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
