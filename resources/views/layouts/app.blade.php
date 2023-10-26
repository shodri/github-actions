<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="UltraIT S.A.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon-32x32.png">
    <meta name="msapplication-TileImage" content="/images/mstile-150x150.png">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/theme.css" rel="stylesheet">
    @auth
            <link href="/assets/css/theme-back.css" rel="stylesheet">
    @endauth

    @yield('styles')

</head>

<body>




    <div class="bg-light fixed-top d-flex justify-content-between align-items-center"
        data-navbar-shadow-on-scroll="data-navbar-shadow-on-scroll">
        <nav class="navbar navbar-expand-md px-4 " style="justify-content: unset;">
            <a class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </a>
            <a class="navbar-brand ms-lg-3" href="index"><img src="/images/logo.png" height="45"></a>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold py-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="true">Buscar propiedades </a>
                        <ul class="dropdown-menu">
                            @foreach($dclasses as $dclass)
    							<li><a class="dropdown-item" href="#">{{ $dclass->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  fw-bold py-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="true">Onpropify </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="quienes">Quienes Somos</a></li>
                            <li><a class="dropdown-item" href="#">Etc.</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold py-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="true">Comunidad</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="c-desarrollador">Desarrolladores</a></li>
                            <li><a class="dropdown-item" href="c-inmobiliaria">Inmobiliarias</a></li>
                            <li><a class="dropdown-item" href="c-agente">Agentes</a></li>
                            <li><a class="dropdown-item" href="c-profesional">Profesionales</a></li>
                            <li><a class="dropdown-item" href="c-inversor">Inversores</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div style="left: unset;" class="me-4  fixed-top mt-3">
            @guest
                @include('layouts.user.guest')
            @else
                @include('layouts.user.auth')
            @endguest
        </div>
    </div>

    @yield('content')

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">

            <div class="row justify-content-between gy-4">
                <div class="col-12 col-lg-4">
                    <div class="d-flex align-items-center mb-3"><img src="/images/logo.png" height="40">
                    </div>
                    <p class="descript">For over 40 years, premier real estate agency for sales and vacation rentals.
                        Nothing compares to our local expertise and the exceptional we can offer you. Let our team of
                        local agents guide you through your buying or selling journey. </p>
                </div>
                <div class="col-6 col-md-auto">
                    <h6 class="fw-bolder mb-3">Acerca del Portal</h6>
                    <div class="d-flex flex-column"><a class="mb-1" href="contenido.html">Careers</a><a class="mb-1"
                            href="contenido.html">Careers</a><a class="mb-1" href="contenido.html">Careers</a><a
                            class="mb-1" href="contenido.html">Careers</a><a class="mb-1"
                            href="contenido.html">Careers</a></div>
                </div>
                <div class="col-6 col-md-auto">
                    <h6 class="fw-bolder mb-3">Comunidad</h6>
                    <div class="d-flex flex-column"><a class="mb-1" href="contenido.html">Careers</a><a class="mb-1"
                            href="contenido.html">Careers</a><a class="mb-1" href="contenido.html">Careers</a><a
                            class="mb-1" href="contenido.html">Careers</a><a class="mb-1"
                            href="contenido.html">Careers</a></div>
                </div>
                <div class="col-6 col-md-auto">
                    <h6 class="fw-bolder mb-3">Onpropify</h6>
                    <div class="d-flex flex-column"><a class="mb-1" href="contenido.html">Careers</a><a class="mb-1"
                            href="contenido.html">Careers</a><a class="mb-1" href="contenido.html">Careers</a><a
                            class="mb-1" href="contenido.html">Careers</a><a class="mb-1"
                            href="contenido.html">Careers</a></div>
                </div>
                <div class="col-6 col-md-auto">
                    <h6 class="fw-bolder mb-3">Seguinos</h6>
                    <div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1"
                            href="contenido.html">Blogs</a><a class="mb-1 fw-semi-bold fs--1 d-flex"
                            href="contenido.html"><i class="bi bi-facebook" style="font-size: 20px;"></i></a><a
                            class="mb-1 fw-semi-bold fs--1 d-flex" href="contenido.html"> <i class="bi bi-twitter"
                                style="font-size: 20px;"></i> </a></div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>

    @hasSection('scripts')
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        @yield('scripts')
    @endif

</body>

</html>