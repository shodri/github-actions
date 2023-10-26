<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="UltraIT S.A.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Backend</title>
    
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/images//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images//favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/images//favicon-32x32.png">
    <meta name="msapplication-TileImage" content="/images//mstile-150x150.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/jquery-confirm.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
    <link href="/assets/css/theme-back.css" rel="stylesheet">

    <style>
    .btn-group-sm>.btn, .btn-xs {
      --bs-btn-padding-y: 0rem;
      --bs-btn-padding-x: 0.5rem;
      --bs-btn-font-size: 0.7rem;
      --bs-btn-border-radius: var(--bs-border-radius-sm);
    }
    </style>
    @yield('styles')

</head>

<body>  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('admin.index') }}">Backend</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.developers.index') }}">Desarrolladoras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.brokers.index') }}">Comercializadoras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.develops.index') }}">Desarrollos</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth::guard('admin')->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <a class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">Salir</a>
                        </form>                
                    </li>
                </ul>                    
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container-fluid p-4 ">
        @yield('content')
</div>

<script src="/assets/js/bootstrap.bundle.min.js"></script>
@hasSection('scripts')
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="/assets/js/jquery-confirm.min.js"></script>
    @yield('scripts')
@endif

</body>

</html>