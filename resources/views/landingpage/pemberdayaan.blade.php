<x-guest-layout>
    <section id="header-hero">
        <div class="container">
            <div class="header-title text-center mt-5">
                <h1 class="fs-1 fw-bold">PEMBERDAYAAN MASYARAKAT</h1>
            </div>
        </div>
    </section>
    <section id="pengurus-section">
        <div class="bg-reds bg-img-overlay item1-img py-5 mt-5">
            <div class="container">
                <div class="text-center">
                    <h1 class="fs-1 fw-bold text-white mb-4">INOVASI PROGRAM DP3AKB</h1>
                </div>
                <div class="row justify-content-center">
                    @foreach ($pemberdayaan as $item)
                        <div class="col-6 col-lg-3 mb-2">
                            <a href="{{$item->link}}"
                                class="text-decoration-none">
                                <figure class="rounded overflow-hidden h-100 bg-white">
                                    <img src="{{asset('storage/pemberdayaan-masyarakat/'.$item->file)}}"
                                        alt="" class="w-100 px-3 py-3 rounded-3">
                                    <figcaption class="bg-white px-3 py-2 text-center">
                                        <h1 class="mb-1 fs-4 text-dark">{{$item->judul}}</h1>
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
