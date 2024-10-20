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
                    {{-- @foreach ($pengurus as $item)
                        <div class="col-xl-3 col-lg-2-4 col-md-3 col-sm-6 h-100 pengurus-item"
                            style="margin-bottom: 1rem;" data-kelurahan-id="{{ $item->kelurahan }}">
                            <figure class="h-100 d-flex flex-column mb-0">
                                <img src="{{ asset("storage/img/forum/pengurus/$item->foto") }}" alt=""
                                    class="w-100" height="280px" style="object-fit: cover; border-radius: 1rem;">
                                <figcaption class="px-0 py-2 text-center h-100">
                                    <p class="fw-bold mb-0 fs-5 lh-sm text-white">{{ $item->nama }}</p>
                                    <p class="text-secondary lh-sm mt-2 mb-0 text-white" style="opacity: 75%">
                                        {{ $item->jabatan }}</p>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach --}}
                </div>

                <!-- Tombol Lihat Lebih -->
                <div class="text-center mt-4">
                    <button id="lihat-lebih-btn" class="btn btn-success">Lihat Lebih</button>
                </div>


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
    @endpush
</x-guest-layout>
