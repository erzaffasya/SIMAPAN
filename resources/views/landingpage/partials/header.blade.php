@push('styles')
    <style>
        .navbar-light .navbar-nav .nav-link.active,
        .navbar-light .navbar-nav .show>.nav-link {
            font-weight: bold !important;
        }
    </style>
@endpush


<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('tlandingpage/asset/img/logo-1.png') }}" height="30"
                class="d-inline-block align-text-top">
            <img src="{{ asset('tlandingpage/asset/img/logo-2.png') }}" height="30"
                class="mx-2 d-inline-block align-text-top">
            <img src="{{ asset('tlandingpage/asset/img/logo-3.png') }}" height="30"
                class="d-inline-block align-text-top">
            <img src="{{ asset('tlandingpage/asset/img/logo-4.jpg') }}" height="30"
                class="d-inline-block align-text-top">
            <span class="fw-bolder ms-2">DP3AKB</span>
            <span class="ms-2 d-none d-lg-inline-block">| Balikpapan</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('simapan') ? 'active' : '' }}"
                        href="{{ url('/simapan') }}">Kegiatan PA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('forum') ? 'active' : '' }}" href="{{ url('/forum') }}">Forum
                        Anak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="{{ url('/profil') }}">Profil
                        Anak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="aboutLink" href="{{ url('/simapan#about-program') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="aspirasiLink" href="{{ url('/simapan#aspirasi-section') }}">Aspirasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        // Function to update active class based on both path and hash
        function updateActiveLink() {
            const currentPath = window.location.pathname;
            const currentHash = window.location.hash;

            // Remove 'active' class from all nav links
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));

            // Check the current path for main links
            if (currentPath === '/simapan' && currentHash === '') {
                document.querySelector('a[href="{{ url('/simapan') }}"]').classList.add('active');
            } else if (currentPath === '/forum') {
                document.querySelector('a[href="{{ url('/forum') }}"]').classList.add('active');
            } else if (currentPath === '/profil') {
                document.querySelector('a[href="{{ url('/profil') }}"]').classList.add('active');
            }

            // Handle hash fragments for About and Aspirasi
            if (currentHash === '#about-program') {
                document.getElementById('aboutLink').classList.add('active');
            } else if (currentHash === '#aspirasi-section') {
                document.getElementById('aspirasiLink').classList.add('active');
            }
        }

        // Call the function on page load
        updateActiveLink();

        // Listen for hash changes and update the active class
        window.addEventListener('hashchange', updateActiveLink);
    </script>
@endpush
