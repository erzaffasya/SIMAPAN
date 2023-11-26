<x-guest-layout>
    <section id="faq-section">
        <div class="bg-reds bg-img-overlay item1-img py-5">
            <div class="container">
                <h1 class="fs-1 fw-normal text-white text-center mb-0">SIGA Kota BALIKPAPAN</h1>
                <p class="fs-6 fw-normal mb-3 text-white text-center">SISTEM INFORMASI GENDER DAN ANAK (SIGA)</p>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <p class=" accordion-header" id="headingTwo">
                                    <button class="fw-bold accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        INDEKS PEMBANGUNAN GENDER
                                    </button>
                                </p>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{-- <p class="fs-6 text-secondary">IPG (INDEKS PEMBANGUNAN GENDER) TAHUN 2022</p> --}}
                                        <div class="form-group attachment-item mt-3">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="https://docs.google.com/document/d/1M4OEhhIC6tO2pnygAbQWjUnegxUpAF_L/edit?usp=drivesdk&ouid=106463378063368732479&rtpof=true&sd=true/download"
                                                        class="btn btn-danger">
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </span>
                                                <input disabled type="text" class="form-control"
                                                    value="IPG (INDEKS PEMBANGUNAN GENDER) TAHUN 2022"
                                                >
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="accordion-item">
                                <p class="accordion-header" id="headingThree">
                                    <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Kebijakan 2
                                    </button>
                                </p>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="fs-6 text-secondary">kebijakan terkait indikator untuk penyelenggaraan Kabupaten/Kota Layak Anak tersedia di 5 klaster dalam bentuk Peraturan Daerah, Peraturan Wali Kota dan Surat Keputusan wali Kota (terlampir)</p>
                                        <div class="form-group attachment-item mt-3">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="https://ev2023.evaluasikla.id/lampiran/1198/download"
                                                        class="btn btn-danger"
                                                    >
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </span>
                                    
                                                <input disabled type="text" class="form-control"
                                                    value="Perda No 5 tahun 2012 tentang Administrasi kependudukan"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group attachment-item mt-3">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="https://ev2023.evaluasikla.id/lampiran/1203/download"
                                                        class="btn btn-danger"
                                                    >
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </span>
                                    
                                                <input disabled type="text" class="form-control"
                                                    value="perwali no 2 tahun 2021 tentang Pedoman Pelaksanaan Program Penuntasan Pendidikan Anak Usia Dini 1 (satu) Tahun Prasekolah Dasar"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group attachment-item mt-3">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="https://ev2023.evaluasikla.id/lampiran/1243/download"
                                                        class="btn btn-danger"
                                                    >
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </span>
                                    
                                                <input disabled type="text" class="form-control"
                                                    value="Perwali No 6 tahun 2019 tentang SISTEM PENANGANAN TERPADU PENYANDANG MASALAH KESEJAHTERAAN SOSIAL ANAK"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
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