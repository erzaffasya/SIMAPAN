<x-guest-layout>
    <section id="header-hero">
        <div class="container">
            <div class="header-title text-center mt-5">
                <h1 class="fs-1 fw-bold">FORUM ANAK BALIKPAPAN</h1>
                <div class="mx-auto">
                    <p class="lead text-secondary mb-4">Mari Wujudkan Balikpapan Menuju Kota Layak Anak</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-8" style="height: 400px; overflow-y: auto;">
                    <img src="{{ asset("storage/img/struktur/$struktur->foto") }}" alt="" class="w-100 rounded"
                        style="object-fit: fill;">
                </div>
                <div class="col-12 col-lg-4">
                    <h1 class="fs-2 fw-bold text-success">Struktur Forum Anak Balikpapan</h1>
                    <p class="fs-5 text-secondary">{!! $struktur->deskripsi !!} </p>
                </div>
            </div>
        </div>
    </section>

    <section id="pengurus-section">
        <div class="bg-greens bg-img-overlay item1-img pt-5 pb-4 mt-5">
            <div class="container">
                <div class="text-center">
                    <h1 class="fs-1 fw-bold text-white mb-4">PROFIL PENGURUS</h1>
                </div>

                <div class="text-end mb-4">
                    <label for="kantor" class="text-white">Filter:</label>
                    <select id="kecamatan" class="form-select"
                        style="width: 200px; display: inline-block; border: 2px solid green; color: green;">
                        <option value="all">Semua Kecamatan</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->code }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    <select id="kelurahan" class="form-select"
                        style="width: 200px; display: inline-block; border: 2px solid green; color: green;" disabled>
                        <option value="all">Pilih Kelurahan</option>
                    </select>
                </div>

                <div class="row w-100 justify-content-between" id="pengurus-container">

                </div>

                <!-- Tombol Lihat Lebih -->
                <div class="text-center mt-4">
                    <button id="lihat-lebih-btn" class="btn btn-success">Lihat Lebih</button>
                </div>


            </div>
        </div>
    </section>

    <section id="ppatbm-program">
        <div class="container py-5">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="display-6 fw-bold mb-3">Artikel Forum Anak</h1>

                <div class="text-end mb-4">
                    <label for="kantor" class="text-white">Filter:</label>
                    <select id="kecamatan-article" class="form-select"
                        style="width: 200px; display: inline-block; border: 2px solid green; color: green;">
                        <option value="all">Semua Kecamatan</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->code }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    <select id="kelurahan-article" class="form-select"
                        style="width: 200px; display: inline-block; border: 2px solid green; color: green;" disabled>
                        <option value="all">Pilih Kelurahan</option>
                    </select>
                </div>

                <a href="{{ route('landingpage.artikel') }}" class="btn btn-link text-decoration-none">Lihat Semua <i
                        class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7">
                    <a href="{{ route('landingpage.artikeldetail', $artikel1->slug) }}" class="text-decoration-none">
                        <figure class="position-relative">
                            <img src="{{ asset("storage/img/forum_artikel/$artikel1->id_kategori_artikel/$artikel1->foto") }}"
                                alt="" class="w-100 rounded" height="370px">
                            <figcaption class="position-relative h-100 d-flex align-items-end">
                                <div class="px-2 py-3 m-0 w-100">
                                    <p class="fs-6 mb-2 text-secondary">{{ $artikel1->created_at->format('D, d M Y') }}
                                    </p>
                                    <h1 class="fs-3 fw-bold text-dark">
                                        {{-- {{ $artikel1->judul }} --}}
                                        {!! \Illuminate\Support\Str::limit($artikel1->judul, 45) !!}
                                    </h1>

                                    <div style="display: flex; color: rgb(17, 184, 17); gap: 3px;">
                                        <i class="fa-solid fa-building"></i>
                                        <p style="font-size: 12px;">
                                            {{ $artikel1->kelurahanForumArtikel ? ucwords(strtolower($artikel1->kelurahanForumArtikel->name)) : '-' }}
                                        </p>
                                    </div>

                                    <p class="fs-6 mb-0 text-secondary">
                                        {{-- {!! $artikel1->isi !!} --}}
                                        {{-- { \Illuminate\Support\Str::limit($artikel1->isi, 45)} --}}
                                        {!! Str::limit(strip_tags($artikel1->isi), $limit = 200, $end = '...') !!}
                                    </p>

                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-12 col-lg-5">
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
                                            <p class="fs-7 mb-2 text-secondary mute">
                                                {{ $item->created_at->format('D, d M Y') }}</p>
                                            <p class="fw-bold mb-2 lh-sm text-dark">
                                                {!! \Illuminate\Support\Str::limit($item->judul, 62) !!}
                                            </p>

                                            <div style="display: flex; color: rgb(17, 184, 17); gap: 3px;">
                                                <i class="fa-solid fa-building"></i>
                                                <p style="font-size: 12px;">
                                                    {{ $item->kelurahanForumArtikel ? ucwords(strtolower($item->kelurahanForumArtikel->name)) : '-' }}
                                                </p>
                                            </div>
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
            <div class="row align-items-center gy-4">
                @foreach ($artikel3 as $item)
                    <div class="col-12 col-lg-3">
                        <a class="card-artikel1" href="{{ route('landingpage.artikeldetail', $item->slug) }}">
                            <figure class="shadow-lg mb-0 position-relative overflow-hidden">

                                <img src="{{ asset("storage/img/forum_artikel/$item->id_kategori_artikel/$item->foto") }}"
                                    alt="" width="100%" height="350">
                                <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                    <p class="fs-7 mb-0 text-secondary" style="margin-bottom: 12px;">
                                        {{ $item->created_at->format('D, d M Y') }}</p>
                                    <p class="fw-bold mb-2 lh-sm text-dark">{!! \Illuminate\Support\Str::limit($item->judul, 55) !!}</p>


                                    <div style="display: flex; color: rgb(17, 184, 17); gap: 3px; margin-top: 10px;">
                                        <i class="fa-solid fa-building"></i>
                                        <p style="font-size: 12px;">
                                            {{ $item->kelurahanForumArtikel ? ucwords(strtolower($item->kelurahanForumArtikel->name)) : '-' }}
                                        </p>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                @endforeach
                {!! $artikel3->links('vendor.pagination.bootstrap-4') !!}

            </div>
            <div class="row mt-4 justify-content-between bg-primary rounded align-items-center p-3">
                <div class="col-12 col-lg-auto">
                    <p class="fw-bold fs-5 text-white mb-0">Tulis Artikelmu sebagai Forum Komunitas Anak</p>
                </div>
                <div class="col-12 col-lg-2">
                    <a href="{{ route('login') }}" class="btn btn-light w-100 text-primary">Gabung Disini</a>
                </div>
            </div>
        </div>
    </section>
    <section id="kegiatan-section">
        <div class="container py-5">
            <h1 class="display-6 fw-bold mb-3 text-center">Kegiatan Forum Anak</h1>
            <div class="row g-0 gy-0">
                @foreach ($ForumKategoriGaleri as $item)
                    <div class="col-12 col-lg-3">
                        <a class="card-kegiatan" href="{{ route('kegiatan-forum-detail', $item->slug) }}">
                            <figure class="mb-0 position-relative">
                                <img src="{{ asset("storage/img/forum_galeri/$item->id/{$item->galeri->pluck('foto')->first()}") }}"
                                    alt="" width="100%" height="250">
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
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            const pengurusData = @json($pengurus);
            const kelurahanData = @json($kelurahan);

            function loadPengurus(kelurahanId = 0) {
                const itemsPerLoad = 8;

                let currentIndex = 0;

                let pengurusData = @json($pengurus).filter(item => item.is_show === 1);
                if (kelurahanId !== 0) {


                    pengurusData = pengurusData.filter(item => item.kelurahan == kelurahanId);


                }



                function chunkArray(array, chunkSize) {
                    let result = [];
                    for (let i = 0; i < array.length; i += chunkSize) {
                        result.push(array.slice(i, i + chunkSize));
                    }
                    return result;
                }


                const chunkedPengurus = chunkArray(pengurusData, 8);



                const pengurusContainer = document.getElementById('pengurus-container');
                const pengurusItems = document.querySelectorAll('.pengurus-item');
                const btnLihatLebih = document.getElementById('lihat-lebih-btn');




                if (currentIndex === 0) {

                    pengurusContainer.innerHTML = '';
                    const items = chunkedPengurus[0];


                    items.forEach(function(item) {
                        const pengurusHTML = `
                                <div class="col-xl-3 col-lg-2-4 col-md-3 col-sm-6 h-100 pengurus-item" style="margin-bottom: 1rem;" data-kelurahan-id="${item.kelurahan}">
                                    <figure class="h-100 d-flex flex-column mb-0">
                                        <img src="storage/img/forum/pengurus/${item.foto}" alt="" class="w-100" height="280px" style="object-fit: cover; border-radius: 1rem;">
                                        <figcaption class="px-0 py-2 text-center h-100">
                                            <p class="fw-bold mb-0 fs-5 lh-sm text-white">${item.nama}</p>
                                            <p class="text-secondary lh-sm mt-2 mb-0 text-white" style="opacity: 75%">${item.jabatan}</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            `;

                        // Tambahkan elemen HTML ke pengurusContainer
                        pengurusContainer.innerHTML += pengurusHTML;
                    });
                }

                btnLihatLebih.addEventListener('click', function() {
                    currentIndex += 1;
                    if (currentIndex < chunkedPengurus.length && currentIndex !== 0) {
                        const items = chunkedPengurus[currentIndex];
                        items.forEach(function(item) {
                            const pengurusHTML = `
                                <div class="col-xl-3 col-lg-2-4 col-md-3 col-sm-6 h-100 pengurus-item" style="margin-bottom: 1rem;" data-kelurahan-id="${item.kelurahan}">
                                    <figure class="h-100 d-flex flex-column mb-0">
                                        <img src="storage/img/forum/pengurus/${item.foto}" alt="" class="w-100" height="280px" style="object-fit: cover; border-radius: 1rem;">
                                        <figcaption class="px-0 py-2 text-center h-100">
                                            <p class="fw-bold mb-0 fs-5 lh-sm text-white">${item.nama}</p>
                                            <p class="text-secondary lh-sm mt-2 mb-0 text-white" style="opacity: 75%">${item.jabatan}</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            `;

                            // Tambahkan elemen HTML ke pengurusContainer
                            pengurusContainer.innerHTML += pengurusHTML;
                        });
                    }

                    console.log(chunkedPengurus[0]);


                    if (currentIndex === chunkedPengurus.length - 1) {
                        btnLihatLebih.style.display = 'none';
                    }
                })

                if (chunkedPengurus[0].length < 8) {
                    btnLihatLebih.style.display = 'none';
                }

            }

            document.addEventListener('DOMContentLoaded', function() {
                loadPengurus();
            });





            document.getElementById('kecamatan').addEventListener('change', function() {
                const kecamatanCode = this.value;
                const kelurahanSelect = document.getElementById('kelurahan');
                const btnLihatLebih = document.getElementById('lihat-lebih-btn');

                // Bersihkan opsi kelurahan
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                kelurahanSelect.disabled = true;




                if (kecamatanCode) {

                    if (kecamatanCode === "all") {
                        loadPengurus();
                        btnLihatLebih.style = "display: block; margin: auto;";
                    }



                    // Filter kelurahan berdasarkan kecamatan yang dipilih
                    const filteredKelurahan = kelurahanData.filter(k => k.district_code === kecamatanCode);

                    // Tambahkan opsi kelurahan yang sesuai
                    filteredKelurahan.forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan.code;
                        option.textContent = kelurahan.name;
                        kelurahanSelect.appendChild(option);
                    });


                    // Enable kelurahan jika ada opsi yang tersedia
                    kelurahanSelect.disabled = filteredKelurahan.length === 0;
                }
            });

            document.getElementById('kelurahan').addEventListener('change', function() {

                const selectedKelurahan = this.value;


                loadPengurus(selectedKelurahan);

            });
        </script>

        <script>
            document.getElementById('kecamatan-article').addEventListener('change', function() {
                const kecamatanCode = this.value;
                const kelurahanSelect = document.getElementById('kelurahan-article');
                kelurahanSelect.innerHTML = '<option value="all">Pilih Kelurahan</option>';
                kelurahanSelect.disabled = true;

                if (kecamatanCode) {
                    const filteredKelurahan = kelurahanData.filter(k => k.district_code === kecamatanCode);
                    filteredKelurahan.forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan.code;
                        option.textContent = kelurahan.name;
                        kelurahanSelect.appendChild(option);
                    });
                    kelurahanSelect.disabled = filteredKelurahan.length === 0;
                }

                // Panggil Ajax untuk memuat artikel dengan kecamatan
                loadArticles(kecamatanCode, 'all');
            });

            document.getElementById('kelurahan-article').addEventListener('change', function() {
                const kelurahanId = this.value;

                // Elemen loading
                let artikel1Container = document.querySelector('.col-12.col-lg-7');
                let artikel2Container = document.querySelector('.col-12.col-lg-5');
                let artikel3Container = document.querySelector('.row.align-items-center.gy-4');

                artikel1Container.innerHTML = '<p>Loading...</p>';
                artikel2Container.innerHTML = '<p>Loading...</p>';
                artikel3Container.innerHTML = '<p>Loading...</p>';

                // Kirim request AJAX ke server
                fetch(`/forum/artikel-kelurahan/${kelurahanId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);

                        // Jika tidak ada artikel1 yang ditemukan
                        if (!data.artikel1) {
                            artikel1Container.innerHTML =
                                '<p class="text-center">Tidak ada data ditemukan</p>';
                        } else {
                            artikel1Container.innerHTML = `
                        <a href="/artikel/${data.artikel1.slug}" class="text-decoration-none">
                            <figure class="position-relative">
                                <img src="/storage/img/forum_artikel/${data.artikel1.id_kategori_artikel}/${data.artikel1.foto}"
                                    alt="" class="w-100 rounded" height="370px">
                                <figcaption class="position-relative h-100 d-flex align-items-end">
                                    <div class="px-2 py-3 m-0 w-100">
                                        <p class="fs-6 mb-2 text-secondary">${new Date(data.artikel1.created_at).toDateString()}</p>
                                        <h1 class="fs-3 fw-bold text-dark">${data.artikel1.judul.substring(0, 45)}</h1>
                                        <div style="display: flex; color: rgb(17, 184, 17); gap: 3px;">
                                            <i class="fa-solid fa-building"></i>
                                            <p style="font-size: 12px;">
                                                ${data.artikel1.kelurahan_forum_artikel ? data.artikel1.kelurahan_forum_artikel.name : '-'}
                                                '-'
                                            </p>
                                        </div>
                                        <p class="fs-6 mb-0" style="color: gray;">
                                            ${data.artikel1.isi.substring(0, 200)}...
                                        </p>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>`;
                        }

                        // Jika tidak ada artikel2 yang ditemukan
                        if (data.artikel2.length === 0) {
                            artikel2Container.innerHTML =
                                '<p class="text-center">Tidak ada artikel selanjutnya ditemukan</p>';
                        } else {
                            let artikel2HTML = '';
                            data.artikel2.forEach(artikel => {
                                artikel2HTML += `
                        <div class="card mb-3 w-100 border-0">
                            <a href="/artikel/${artikel.slug}" class="text-decoration-none">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="/storage/img/forum_artikel/${artikel.id_kategori_artikel}/${artikel.foto}" class="rounded w-100" alt="..." height="160px">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body h-100">
                                            <p class="fs-7 mb-2 text-secondary mute">${new Date(artikel.created_at).toDateString()}</p>
                                            <p class="fw-bold mb-2 lh-sm text-dark">${artikel.judul.substring(0, 62)}</p>
                                            <div style="display: flex; color: rgb(17, 184, 17); gap: 3px;">
                                                <i class="fa-solid fa-building"></i>
                                                <p style="font-size: 12px;">${artikel.kelurahan_forum_artikel ? artikel.kelurahan_forum_artikel.name : '-'}</p>
                                            </div>
                                            <p class="fs-6 mb-0 text-secondary">${artikel.isi.substring(0, 62)}...</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>`;
                            });
                            artikel2Container.innerHTML = artikel2HTML;
                        }

                        // Jika tidak ada artikel3 yang ditemukan
                        if (data.artikel3.data.length === 0) {
                            artikel3Container.innerHTML =
                                '<p class="text-center">Tidak ada data terkait ditemukan</p>';
                        } else {
                            let artikel3HTML = '';
                            data.artikel3.data.forEach(artikel => {
                                artikel3HTML += `
                        <div class="col-12 col-lg-3">
                            <a class="card-artikel1" href="/artikel/${artikel.slug}">
                                <figure class="shadow-lg mb-0 position-relative overflow-hidden">
                                    <img src="/storage/img/forum_artikel/${artikel.id_kategori_artikel}/${artikel.foto}" alt="" width="100%" height="350">
                                    <figcaption class="rounded bg-white py-2 px-3 mx-auto">
                                        <p class="fs-7 mb-0 text-secondary">${new Date(artikel.created_at).toDateString()}</p>
                                        <p class="fw-bold mb-2 lh-sm text-dark">${artikel.judul.substring(0, 55)}</p>
                                        <div style="display: flex; color: rgb(17, 184, 17); gap: 3px;">
                                            <i class="fa-solid fa-building"></i>
                                            <p style="font-size: 12px;">${artikel.kelurahan_forum_artikel ? artikel.kelurahan_forum_artikel.name : '-'}</p>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>`;
                            });
                            artikel3Container.innerHTML = artikel3HTML;
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        artikel1Container.innerHTML = '<p>Error loading data</p>';
                        artikel2Container.innerHTML = '<p>Error loading data</p>';
                        artikel3Container.innerHTML = '<p>Error loading data</p>';
                    });
            });
        </script>
    @endpush
</x-guest-layout>
