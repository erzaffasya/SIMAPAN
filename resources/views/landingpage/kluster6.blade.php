<x-guest-layout>

    <section>
        <div class="container pt-5" style="margin-top: 4rem; margin-bottom: 4rem;">
            <div class="d-flex justify-center align-items-center " style="padding: 0 3rem;">
                <div class="mb-2 " style="flex: 1; margin-right: 8rem;">
                    <figure class="d-flex align-items-center mb-0">
                        <img src="{{ asset('tlandingpage/asset/img/kluster-6.png') }}" alt="" width="125px">
                        <figcaption class="ps-4">
                            <h1>Kelembagaan</h1>

                        </figcaption>
                    </figure>
                </div>
                <div class="mb-4" style="flex: 3;">Kebijakan-kebijakan yang tercakup dalam kelembagaan DP3AKB mencakup
                    berbagai aspek, baik yang dikelola oleh Pemerintah Daerah maupun Pemerintah Nasional, untuk
                    mendukung perlindungan, pemberdayaan, dan kesejahteraan anak serta keluarga.</div>
            </div>
        </div>
    </section>




    <section id="faq-section">
        <div class="bg-reds bg-img-overlay item1-img py-5">
            <div class="container">
                <h1 class="fs-2 fw-normal mb-3 text-white text-center">Peraturan/Kebijakan Daerah tentang Kabupaten/Kota
                    Layak Anak</h1>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="accordion" id="accordionExample">
                            @foreach ($lKebijakan as $kebijakan)
                                <div class="accordion-item">
                                    <p class=" accordion-header" id="headingTwo">
                                        <button class="fw-bold accordion-button" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target='{{ "#collapseTwo$loop->iteration" }}'
                                            aria-controls='{{ "collapseTwo$loop->iteration" }}'>
                                            {{ $kebijakan->judul }}
                                        </button>
                                    </p>
                                    <div id='{{ "collapseTwo$loop->iteration" }}'
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : 'hide' }}"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="fs-6 text-secondary">{{ $kebijakan->deskripsi }}</p>
                                            @foreach ($kebijakan->detail as $item)
                                                <div class="form-group attachment-item mt-3">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a href="{{ asset("storage/files/pdf/kebijakan/$item->file") }}"
                                                                class="btn btn-danger">
                                                                <i class="fa fa-download"></i> Download
                                                            </a>
                                                        </span>
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $item->judul }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @push('scripts')
    <script>
        const fileName = 'dummy.pdf';
        const downloadButton = document.getElementById('downloadButton');
        downloadButton.innerText = `Download ${fileName}`;
    </script>

    @endpush --}}
</x-guest-layout>
