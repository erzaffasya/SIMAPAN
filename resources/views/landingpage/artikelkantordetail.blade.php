<x-guest-layout>

    <section id="artikel-detail">
        <div class="container">
            <div class="row pb-5 justify-content-center">
                <div class="col-10">
                    <figure>
                        <img src="{{ asset("storage/img/kegiatan/$kegiatan->kantor_id/$kegiatan->foto") }}" class="w-100 rounded"
                            alt="" height="500px">
                        <figcaption>
                            <div class="px-2 py-3 m-0 w-100">
                                <p class="fs-6 mb-2 text-secondary">{{ $kegiatan->created_at->format('D, d M Y') }} -
                                    <span class="text-primary">By
                                        PPATBM Klandasan</span> </p>
                                <h1 class="fs-1 fw-bold">{{ $kegiatan->judul }}</h1>
                                <p class="fs-6 mb-0 text-secondary">
                                    {!! $kegiatan->isi !!}</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-9">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="fs-3 fw-bold mb-0">Artikel Lainnya</h1>
                        <a href="{{ route('landingpage.artikel-kantor') }}" class="btn btn-link text-decoration-none">Lihat
                            Semua</a>
                    </div>
                </div>

                <div class="col-12"></div>

                @foreach ($kegiatanLainnya as $item)
                    <div class="col-3">
                        <a class="card-artikel1" href="{{route('landingpage.artikel-kantor-detail', $item->slug)}}">
                            <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                                <img src="{{ asset("storage/img/kegiatan/$item->kantor_id/$item->foto") }}" alt=""
                                    width="100%" height="350">
                                <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                    <p class="fw-bold mb-2 lh-sm text-dark">{!! \Illuminate\Support\Str::limit($item->judul, 55) !!}
                                    </p>
                                    <p class="fs-6 mb-0 text-secondary">{{$item->created_at->format('D, d M Y')}}</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


</x-guest-layout>
