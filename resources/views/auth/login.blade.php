<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - DP3AKB BALIKPAPAN</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('tadmin/assets/img/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('tadmin/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('tadmin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tadmin/assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('tadmin/assets/css/style.css') }}">

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            {{-- <div class="login-logo logo-normal">
                                <img src="{{ asset('tadmin/assets/img/logo.png') }}" alt="img">
                            </div>
                            <a href="index.html" class="login-logo logo-white">
                                <img src="{{ asset('tadmin/assets/img/logo-white.png') }}" alt="">
                            </a> --}}
                            <div class="login-userheading">
                                <img src="{{asset('tadmin/assets/img/logo-dp3akb-full.png')}}" style="width: 200px"  alt="">
                                <h3>Selamat Datang di DP3AKB</h3>
                                <h4>Masukkan akun anda dengan benar !</h4>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input name="email" type="text" placeholder="Enter your email address">
                                    <img src="{{ asset('tadmin/assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input name="password" type="password" class="pass-input"
                                        placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('tlandingpage/asset/img/p1-3.jpg') }}" alt="img" style="object-fit: cover">
                    {{-- <img src="{{ asset('tlandingpage/asset/img/p1-2.jpg') }}" width="280" height="250"> --}}

                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
    
    <!-- jQuery -->
    <script src="{{ asset('tadmin/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('tadmin/assets/js/feather.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('tadmin/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('tadmin/assets/js/script.js') }}"></script>

</body>

</html>
