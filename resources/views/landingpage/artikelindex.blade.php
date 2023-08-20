<x-guest-layout>
    <section id="ppatbm-program">
        <div class="container py-5">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="display-6 fw-bold mb-3">Artikel Forum Anak</h1>
            </div>
            <div class="row">
                <div class="col-7">
                    <a href="{{ route('landingpage.artikeldetail', $artikel1->slug) }}" class="text-decoration-none">
                        <figure class="position-relative">
                            <img src="{{ asset("storage/img/forum_artikel/$artikel1->id_kategori_artikel/$artikel1->foto") }}"
                                alt="" class="w-100 rounded" height="370px">
                            <figcaption class="position-relative h-100 d-flex align-items-end">
                                <div class="px-2 py-3 m-0 w-100">
                                    <p class="fs-6 mb-2 text-secondary">
                                        {{ $artikel1->created_at->format('D, d M Y') }}
                                    </p>
                                    <h1 class="fs-3 fw-bold">
                                        {{-- {{ $artikel1->judul }} --}}
                                        {!! \Illuminate\Support\Str::limit($artikel1->judul, 45) !!}
                                    </h1>
                                    <p class="fs-6 mb-0 text-secondary">
                                        {!! Str::limit(strip_tags($artikel1->isi), $limit = 200, $end = '...') !!}
                                        {{-- {!! $artikel1->isi !!} --}}
                                    </p>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-5">
                    @foreach ($artikel2 as $item)
                        <div class="card mb-3 w-100 border-0">
                            <a href="{{ route('landingpage.artikeldetail', $item->slug) }}"
                                class="text-decoration-none">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}"
                                            class="rounded w-100" alt="..." height="160px">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body h-100">
                                            <p class="fs-6 mb-2 text-secondary mute">
                                                {{ $item->created_at->format('D, d M Y') }}</p>
                                            <p class="fw-bold mb-2 lh-sm text-dark">
                                                {!! \Illuminate\Support\Str::limit($item->judul, 62) !!}
                                            </p>
                                            <p class="fs-6 mb-0 text-secondary">
                                                {!! Str::limit(strip_tags($item->isi), $limit = 62, $end = '...') !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-between py-4">
                <div class="col-4">
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Tulis Judul"
                                aria-label="Tulis Judul" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="button" id="button-addon2">Cari Artikel</button>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <form action="">
                        <select class="form-select form-select-lg" aria-label="Default select example">
                            <option selected>Terbaru</option>
                            <option value="1">Terpopuler</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="row align-items-center gy-4">
                @foreach ($artikel3 as $item)
                    <div class="col-3">
                        <a class="card-artikel1" href="{{ route('landingpage.artikeldetail', $item->slug) }}">
                            <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                                <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}"
                                    alt="" width="100%" height="350">
                                <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                    <p class="fw-bold mb-2 lh-sm text-dark">{!! \Illuminate\Support\Str::limit($item->judul, 55) !!}
                                    </p>
                                    <p class="fs-6 mb-0 text-secondary">{{ $item->created_at->format('D, d M Y') }}</p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                @endforeach
                {!! $artikel3->links('vendor.pagination.bootstrap-4') !!}
            </div>
            <div class="row mt-4 justify-content-between bg-primary rounded align-items-center p-3">
                <div class="col-auto">
                    <p class="fw-bold fs-5 text-white mb-0">Tulis Artikelmu sebagai Forum Komunitas Anak</p>
                </div>
                <div class="col-2">
                    <a href="#" class="btn btn-light w-100 text-primary">Gabung Disini</a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
