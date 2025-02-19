<x-guest-layout>
    <section>
        <div class="container pt-5" style="margin-top: 4rem;">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 mb-2 col-lg-4">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-4.png') }}" alt="" width="40%">
                        <figcaption class="ps-4">
                            <h1>{{ $kluster->title ?? 'Default Title' }}</h1>
                            <p class="mb-0 fs-5 text-secondary">{{ $kluster->subtitle ?? 'Default Subtitle' }}</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-10 col-lg-6 mb-4">{!! $kluster->description ?? 'Default Description' !!}</div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5" style="margin-top: 7.5rem;">
            <div class="d-flex flex-column justify-content-between">
                <h1 class="display-6 fw-bold mb-3">Artikel Kluster {{ $kluster->kluster ?? 'Default Kluster' }}</h1>
                <div class="bg-success" style="width: 100px; height: 10px;"></div>
            </div>

            @include('components.artikel-kluster')
        </div>
    </section>

    @php
        $countartikel = 0;
    @endphp
    @foreach ($kluster->artikel ?? [] as $artikel)
        @switch($artikel->jenis)
            @case('A')
                @php
                    if ($artikel->jenis == 'A') {
                        $countartikel = $countartikel + 1;
                    }
                @endphp

                <section>
                    <div class="container py-5">
                        <div class="row align-items-start justify-content-center">
                            @if ($artikel->title != null)
                                <div class="col-11 text-center order-1">
                                    <h4 class="text-success mb-2">{{ $artikel->title }}</h4>
                                    <p class="text-secondary fs-6 lh-lg">{{ $artikel->subtitle ?? '' }}</p>
                                </div>
                            @endif
                            <div
                                class="{{ $artikel->description == null ? 'col-10' : 'col-6' }} {{ $countartikel % 2 ? 'order-2' : 'order-3' }}">
                                <div class="slide-1-view">
                                    @forelse ($artikel->detail ?? [] as $item)
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
                            @if ($artikel->description != null)
                                <div class="col-6 {{ $countartikel % 2 ? 'order-3' : 'order-2' }}">
                                    {!! $artikel->description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @break

            @case('B')
                <section>
                    <div class="bg-greens bg-img-overlay item1-img pt-4 pb-5 mt-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-10">
                                    <h4 class="text-center text-white mb-4 lh-md">{{ $artikel->title ?? '' }}</h4>
                                </div>
                                <div class="col-10 mb-2 col-lg-3">
                                    <a href="/kluster1" class="text-decoration-none">
                                        @if ($artikel->detail->has(0))
                                            <figure class="rounded overflow-hidden h-100 bg-white">
                                                <img src="{{ asset("storage/img/artikel_kluster/$kluster->kluster/{$artikel->detail[0]->foto}") }}"
                                                    alt="" class="w-100">
                                                <figcaption class="bg-white px-3 py-2 text-center">
                                                    <h5 class="mb-1 text-dark">{{ $artikel->detail[0]->title ?? '-' }}</h5>
                                                    <p class="text-secondary mb-0">{{ $artikel->detail[0]->subtitle ?? '' }}</p>
                                                </figcaption>
                                            </figure>
                                        @else
                                            <figure class="rounded overflow-hidden h-100 bg-white">
                                                <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" alt=""
                                                    class="w-100">
                                                <figcaption class="bg-white px-3 py-2 text-center">
                                                    <h5 class="mb-1 text-dark">-</h5>
                                                    <p class="text-secondary mb-0"></p>
                                                </figcaption>
                                            </figure>
                                        @endif
                                    </a>
                                </div>
                                <div class="col-10 mb-2 col-lg-3">
                                    @if ($artikel->detail->has(1))
                                        <figure class="rounded overflow-hidden h-100 bg-white">
                                            <img src="{{ asset("storage/img/artikel_kluster/$kluster->kluster/{$artikel->detail[1]->foto}") }}"
                                                alt="" class="w-100">
                                            <figcaption class="bg-white px-3 py-2 text-center">
                                                <h5 class="mb-1 text-dark">{{ $artikel->detail[1]->title ?? '-' }}</h5>
                                                <p class="text-secondary mb-0">{{ $artikel->detail[1]->subtitle ?? '' }}</p>
                                            </figcaption>
                                        </figure>
                                    @else
                                        <figure class="rounded overflow-hidden h-100 bg-white"></figure>
                                            <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" alt=""
                                                class="w-100">
                                            <figcaption class="bg-white px-3 py-2 text-center">
                                                <h5 class="mb-1 text-dark">-</h5>
                                                <p class="text-secondary mb-0"></p>
                                            </figcaption>
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-10 mb-2 col-lg-3">
                                    @if ($artikel->detail->has(2))
                                        <figure class="rounded overflow-hidden h-100 bg-white">
                                            <img src="{{ asset("storage/img/artikel_kluster/$kluster->kluster/{$artikel->detail[2]->foto}") }}"
                                                alt="" class="w-100">
                                            <figcaption class="bg-white px-3 py-2 text-center">
                                                <h5 class="mb-1 text-dark">{{ $artikel->detail[2]->title ?? '-' }}</h5>
                                                <p class="text-secondary mb-0">{{ $artikel->detail[2]->subtitle ?? '' }}</p>
                                            </figcaption>
                                        </figure>
                                    @else
                                        <figure class="rounded overflow-hidden h-100 bg-white">
                                            <img src="{{ asset('tlandingpage/asset/img/empty-img.jpeg') }}" alt=""
                                                class="w-100">
                                            <figcaption class="bg-white px-3 py-2 text-center">
                                                <h5 class="mb-1 text-dark">-</h5>
                                                <p class="text-secondary mb-0"></p>
                                            </figcaption>
                                        </figure>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @break

            @case('C')
                <section>
                    <div class="bg-reds bg-img-overlay item1-img py-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-10 col-lg-4">
                                    <p class="fs-4 text-white fs-6 lh-lg">{{ $artikel->title ?? '' }}</p>
                                    <h3 class="text-white mb-4 lh-lg">{{ $artikel->subtitle ?? '' }}</h3>
                                </div>
                                <div class="col-10 col-lg-8">
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($artikel->detail ?? [] as $item)
                                            <div class="accordion-item">
                                                <p class="accordion-header" id="pg1">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#cpg1{{ $artikel->id }}{{ $loop->iteration }}"
                                                        aria-expanded="false"
                                                        aria-controls="cpg1{{ $artikel->id }}{{ $loop->iteration }}">
                                                        {{ $item->title ?? '' }}
                                                    </button>
                                                </p>
                                                <div id="cpg1{{ $artikel->id }}{{ $loop->iteration }}"
                                                    class="accordion-collapse collapse" aria-labelledby="pg1"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        {{ $item->subtitle ?? '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @break

            @default
        @endswitch
    @endforeach

    @push('scripts')
        <script>
            const c4ctx = document.getElementById('c4chart');
            const c4data2022 = @json($sekolah_ramah_anak ?? []); // Contoh data dua label untuk tahun 2022
            const tahun = @json($tahun ?? []);
            new Chart(c4ctx, {
                type: 'bar',
                data: {
                    labels: tahun,
                    datasets: [{
                            label: 'TK/RA/PAUD',
                            data: [c4data2022[0] ?? 0],
                            backgroundColor: 'rgba(62, 201, 62, 0.5)', // Warna untuk label 1
                            borderWidth: 1
                        },
                        {
                            label: 'SD/MI',
                            data: [c4data2022[1] ?? 0],
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna untuk label 2
                            borderWidth: 1
                        },
                        {
                            label: 'SMP/MTS',
                            data: [c4data2022[2] ?? 0],
                            backgroundColor: 'rgba(50, 168, 133, 0.5)', // Warna untuk label 3
                            borderWidth: 1
                        },
                        {
                            label: 'SMA/SMK/MA',
                            data: [c4data2022[3] ?? 0],
                            backgroundColor: 'rgba(15, 61, 122, 0.5)', // Warna untuk label 4
                            borderWidth: 1
                        },
                        {
                            label: 'SLB',
                            data: [c4data2022[4] ?? 0],
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
