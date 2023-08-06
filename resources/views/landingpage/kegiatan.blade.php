<x-guest-layout>
    <section id="kegiatan-section">
        <div class="container py-5">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="display-6 fw-bold mb-3">Gallery Kegiatan</h1>
            </div>
            <div class="row justify-content-between py-4">
                <div class="col-4">
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Tulis Judul"
                                aria-label="Tulis Judul" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="button" id="button-addon2">Cari Kegiatan</button>
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
            <div class="row align-items-center gy-0">
                @foreach ($ForumKategoriGaleri as $item)
                    <div class="col-3">
                        <a class="card-kegiatan" href="{{route('kegiatan-forum-detail',$item->slug)}}">
                            <figure class="mb-0 position-relative">
                                <img src="{{ asset("storage/img/forum_kategori_galeri/$item->foto") }}" alt=""
                                    width="100%" height="250">
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

                <nav aria-label="Page navigation example">
                    <br>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</x-guest-layout>
