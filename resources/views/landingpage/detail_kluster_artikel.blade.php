<x-guest-layout>


    <section id="artikel-detail">
        <div class="container">
            <div class="row pb-5 justify-content-center">
                <div class="col-12 col-lg-10">
                    <figure>
                        <img src="{{ asset('storage/img/artikel_kluster/' . $artikel->urut . '/' . $artikel->detail[0]->foto) }}"
                            class="artikel-head-img w-100 rounded" alt="" height="500px">
                        <figcaption>
                            <div class="px-2 py-3 m-0 w-100">
                                <h1 class="text-success">{{ $artikel->title }}</h1>
                                <p class="fs-6 mb-2 text-secondary">{{ $artikel->created_at->format('D, d M Y') }}
                                    {{-- <span class="text-primary">By
                                    {{$artikel->iuse}}</span>  --}}
                                </p>
                                <h1 class="fs-1 fw-bold">{{ $artikel->judul }}</h1>
                                <p class="fs-6 mb-0 text-secondary">
                                    {!! $artikel->description !!}</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="fs-3 fw-bold mb-0">Artikel Lainnya</h1>
                        <a href="/kluster{{ $artikel->urut }}" class="btn btn-link text-decoration-none"
                            style="min-width: 200px;">Lihat
                            Semua

                            <svg width="24px" height="24px" viewBox="0 -6.5 36 36" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="#007BFF">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>right-arrow</title>
                                    <desc>Created with Sketch.</desc>
                                    <g id="icons" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="ui-gambling-website-lined-icnos-casinoshunter"
                                            transform="translate(-212.000000, -159.000000)" fill="#007BFF"
                                            fill-rule="nonzero">
                                            <g id="square-filled" transform="translate(50.000000, 120.000000)">
                                                <path
                                                    d="M187.108012,39.2902857 L197.649804,49.7417043 L197.708994,49.7959169 C197.889141,49.9745543 197.986143,50.2044182 198,50.4382227 L198,50.5617773 C197.986143,50.7955818 197.889141,51.0254457 197.708994,51.2040831 L197.6571,51.2479803 L187.108012,61.7097143 C186.717694,62.0967619 186.084865,62.0967619 185.694547,61.7097143 C185.30423,61.3226668 185.30423,60.6951387 185.694547,60.3080911 L194.702666,51.3738496 L162.99947,51.3746291 C162.447478,51.3746291 162,50.9308997 162,50.3835318 C162,49.8361639 162.447478,49.3924345 162.99947,49.3924345 L194.46779,49.3916551 L185.694547,40.6919089 C185.30423,40.3048613 185.30423,39.6773332 185.694547,39.2902857 C186.084865,38.9032381 186.717694,38.9032381 187.108012,39.2902857 Z M197.115357,50.382693 L186.401279,61.0089027 L197.002151,50.5002046 L197.002252,50.4963719 L196.943142,50.442585 L196.882737,50.382693 L197.115357,50.382693 Z"
                                                    id="right-arrow"> </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>

                        </a>
                    </div>
                </div>

                <div class="col-12 col-lg-10 row">
                    @foreach ($artikelLain as $item)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a class="card-artikel1" href="{{ url('/kluster' . $item->urut . '/' . $item->slug) }}">
                                <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                                    <img src="{{ asset('storage/img/artikel_kluster/' . $item->urut . '/' . $item->detail[0]->foto) }}"
                                        alt="" width="100%" height="350">
                                    <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                        <p class="fw-bold mb-2 lh-sm text-dark">
                                            {!! \Illuminate\Support\Str::limit($item->title, 55) !!}
                                        </p>
                                        <p class="fs-6 mb-0 text-secondary">{{ $item->created_at->format('D, d M Y') }}
                                        </p>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    @endforeach
                </div>






            </div>
        </div>
    </section>





</x-guest-layout>
