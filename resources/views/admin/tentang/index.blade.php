<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Tentang</h4>
                <h6>Manajemen Tentang</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('tentang.create') }}" class="btn btn-added"><img
                        src="{{ asset('tadmin/assets/img/icons/plus.svg') }}" alt="img">Tambah Section</a>
            </div>
        </div>

        @foreach ($abouts as $about)
            <div class="card mb-3" style="width: 100%; padding: 2rem;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <iframe width="100%" height="315" class="yt-tentang rounded" src="{{ $about->video ?? '' }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body" style="position: relative;">
                            <div
                                style="padding: 0.5rem 1.5rem; background: #fd7e14; color: white; border-radius: 1rem; position: absolute; top: -5%; right: -15%;">
                                Section {{ $loop->iteration }}
                            </div>

                            <h5 class="card-title">{{ $about->title ?? 'Belum ada judul' }}</h5>
                            <p class="card-text fs-6 text-secondary">{{ $about->tentang }}</p>



                            <div class="d-flex fs-6 text-secondary " style="max-width: 400px; ">
                                <p class="" style="width: 125px">Email</p>
                                <p style="color: #212529; font-weight: bold;">{{ $about->email }}</p>
                            </div>

                            <div class="d-flex fs-6 text-secondary " style="max-width: 400px; ">
                                <p class="" style="width: 125px">No Telp</p>
                                <p style="color: #212529; font-weight: bold;">{{ $about->phone }}</p>
                            </div>

                            <div class="d-flex fs-6 text-secondary " style="max-width: 400px; ">
                                <p class="" style="width: 125px">Whatsapp</p>
                                <p style="color: #212529; font-weight: bold;">{{ $about->whatsapp }}</p>
                            </div>


                            <div class="d-flex fs-6 text-secondary " style="max-width: 800px; ">
                                <p class="" style="min-width: 125px">Alamat</p>
                                <p style="color: #212529; font-weight: bold;">{{ $about->alamat }}</p>
                            </div>






                        </div>
                    </div>

                    <div class="col-md-1"
                        style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1rem;">

                        <a href="{{ route('tentang.edit', $about->id) }}">
                            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                        stroke="#ffc107" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                    <path
                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                        stroke="#ffc107" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                        </a>
                        <a class='confirm-text' href='javascript:void(0);' data-bs-toggle='modal'
                            data-bs-target='#deleteModal' data-id='{{ $about->id }}'
                            data-action="{{ route('tentang.destroy', $about->id) }}"
                            data-message='{{ $about->title ?? 'Tentang Simapan Ini' }}'>
                            <img src="{{ asset('tadmin/assets/img/icons/delete.svg') }}" alt="img" width="32"
                                height="32">
                        </a>
                    </div>
                </div>
        @endforeach
    </div>
</x-app-layout>
