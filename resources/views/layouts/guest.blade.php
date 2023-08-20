<!doctype html>
<html lang="en">

<head>
    @include('landingpage.partials.head')
</head>

<body>
    <div id="coreWrap">
        <header>
            @include('landingpage.partials.header')
        </header>
        <main>
            <br>
            <br>
            <div class="wa-widget position-fixed">
                <a href="https://wa.me/6282152858026" class="text-decoration-none shadow-lg">
                    <img src="{{asset('tlandingpage/asset/img/widget-wa.png')}}" alt="" height="55px">
                    {{-- <img src="{{asset('tlandingpage/asset/img/logo-3.png')}}" height="30" class="d-inline-block align-text-top"> --}}
                </a>
            </div>
            {{ $slot }}

        </main>
        <footer style="background-color: #142841;">
            @include('landingpage.partials.footer')
        </footer>
    </div>

    @include('landingpage.partials.scripts')
</body>

</html>
