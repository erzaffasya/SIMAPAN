<x-guest-layout>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 col-lg-4 mb-2">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-5.png') }}" alt="" width="30%">
                        <figcaption class="ps-4">
                            <h1>KLUSTER 5</h1>
                            <p class="mb-0 fs-5 text-secondary">Perlindungan Khusus</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-10 col-lg-6 mb-4">Hak sipil kebebasan anak adalah hak-hak asasi manusia yang melekat pada setiap anak,
                    yang bertujuan untuk melindungi dan menghormati martabat, kebebasan, dan kepentingan mereka.</div>
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



</x-guest-layout>
