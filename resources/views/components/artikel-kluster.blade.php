@if (!$kluster->artikel->isEmpty())
    <div class="row" style="margin-top: 5rem;">
        <div class="col-12 col-lg-7">
            <a href="{{ url('/kluster' . $kluster->kluster . '/' . $artikel1->slug) }}" class="text-decoration-none">
                <figure class="position-relative">
                    <img src="{{ asset('storage/img/artikel_kluster/' . $kluster->kluster . '/' . $artikel1->detail[0]->foto) }}"
                        alt="" class="w-100 rounded" height="370px">
                    <figcaption class="position-relative h-100 d-flex align-items-end">
                        <div class="px-2 py-3 m-0 w-100">
                            <p class="fs-6 mb-2 text-secondary">
                                {{ $artikel1->created_at->format('D, d M Y') }}
                            </p>
                            <h1 class="fs-3 fw-bold text-dark">
                                {{-- {{ $kluster->artikel[0]->judul }} --}}
                                {!! \Illuminate\Support\Str::limit($artikel1->title, 45) !!}
                            </h1>
                            <p class="fs-6 mb-0 text-secondary">
                                {!! Str::limit(strip_tags($artikel1->description), $limit = 200, $end = '...') !!}
                                {{-- {!! $kluster->artikel[0]1->isi !!} --}}
                            </p>
                        </div>
                    </figcaption>
                </figure>
            </a>
        </div>
        <div class="col-12 col-lg-5">
            @foreach ($artikel2 ?? [] as $item)
                <div class="card mb-3 w-100 border-0">
                    <a href="{{ url('/kluster' . $item->urut . '/' . $item->slug) }}" class="text-decoration-none">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{ asset('storage/img/artikel_kluster/' . $item->urut . '/' . $item->detail[0]->foto) }}"
                                    class="rounded w-100" alt="..." height="160px">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body h-100">
                                    <p class="fs-6 mb-2 text-secondary mute">
                                        {{ $item->created_at->format('D, d M Y') }}</p>
                                    <p class="fw-bold mb-2 lh-sm text-dark">
                                        {!! \Illuminate\Support\Str::limit($item->title, 62) !!}
                                    </p>
                                    <p class="fs-6 mb-0 text-secondary">
                                        {!! Str::limit(strip_tags($item->subtitle), $limit = 62, $end = '...') !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <form action="">
        <div class="row justify-content-between pt-4">
            <div class="col-12 col-lg-6">
                <div class="input-group mb-3">
                    <input type="text" name="c" class="form-control form-control-lg" placeholder="Tulis Judul"
                        aria-label="Tulis Judul" aria-describedby="button-addon2" value="{{ $c ?? '' }}" required>
                    <button class="btn btn-success" type="submit" id="button-addon2">Cari Artikel</button>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <select class="form-select form-select-lg" aria-label="Default select example" name="s"
                    onchange="this.closest('form').submit()">
                    <option value="d" {{ $s ?? '' == 'DESC' ? 'selected' : '' }}>Terbaru</option>
                    <option value="a" {{ $s ?? '' == 'ASC' ? 'selected' : '' }}>Terlama</option>
                </select>
            </div>
        </div>
    </form>
    <div class="row justify-content-between pb-4">
        @if ($c ?? '')
            <h6>Mencari Artikel Dengan Kata Kunci <span style="font-weight: 900">{{ $c ?? '' }}</span>
            </h6>
            <a href="{{ url('kluster' . $kluster->kluster . '/') }}" class="text-secondary">Bersihkan</a>
        @endif
    </div>

    <div class="row align-items-center gy-4">
        @forelse ($kluster->artikel  ?? [] as $item)
            <div class="col-12 col-lg-3">
                <a class="card-artikel1" href="{{ url('/kluster' . $item->urut . '/' . $item->slug) }}">
                    <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                        <img src="{{ asset('storage/img/artikel_kluster/' . $item->urut . '/' . $item->detail[0]->foto) }}"
                            alt="" width="100%" height="350">
                        <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                            <p class="fw-bold mb-2 lh-sm text-dark">{!! \Illuminate\Support\Str::limit($item->title, 55) !!}
                            </p>
                            <p class="fs-6 mb-0 text-secondary">{{ $item->created_at->format('D, d M Y') }}
                            </p>
                        </figcaption>
                    </figure>
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <h5>Tidak Ada Artikel Ditemukan</h5>
            </div>
        @endforelse

        <div class="d-flex justify-content-center">
            {{-- @include('components.pagination', ['paginator' => $kluster->artikel ]) --}}
        </div>

    </div>
@else
    <div class="text-center my-4">
        <h5>Tidak Ada Artikel Ditemukan</h5>
    </div>
@endif
