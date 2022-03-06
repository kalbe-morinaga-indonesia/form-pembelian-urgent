<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Form Pembelian Urgent')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('theme/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('theme/dist/img/logo-kalbe.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('theme/dist/img/header-kalbe.png') }}" width="150"
                        alt="Kalbe Morinaga Indonesia">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <h3 class="mx-auto my-auto font-weight-bold">Form Pembelian Urgent</h3>
                    @if (Route::has('login'))
                    @auth

                    @else
                    {{-- Desktop --}}
                    <div class="my-2 mt-lg-0 d-none d-md-block">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
                            </li>
                        </ul>
                    </div>
                    {{-- Mobile --}}
                    <div class="d-sm-block d-md-none">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-secondary my-2 my-sm-0 px-4 btn-block" href="#">Login</a>
                            </li>
                        </ul>
                    </div>
                    @endauth
                    @endif
                </div>
            </div>
        </nav>


        <section class="content">
            <div class="container">
                @yield('content')
            </div>
        </section>

        <footer class="container">
            <strong>Copyright &copy; 2022 <a href="#">PT Kalbe Morinaga Indonesia</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

    </div>

    <script src="{{ asset('theme/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/adminlte.js') }}"></script>
</body>

</html>
