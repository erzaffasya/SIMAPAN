<x-guest-layout>

    <section id="artikel-detail">
        <div class="container" style="margin-top: 4rem;">
            <div class="row pb-5 justify-content-center">
                <div class="col-12 col-lg-10">
                    <figure>

                        <a href="{{ asset("storage/img/banner/$banner->gambar") }}" target="_blank">
                            <img src="{{ asset("storage/img/banner/$banner->gambar") }}"
                                class="artikel-head-img w-100 rounded" style="max-height: 80vh; object-fit: contain;">
                        </a>

                        <figcaption>
                            <div class="px-2 py-3 m-0 w-100">

                                <h1 class="fs-1 fw-bold">{{ $banner->judul }}</h1>
                                <p class="fs-6 mb-0 text-secondary">
                                    {!! $banner->deskripsi !!}</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
