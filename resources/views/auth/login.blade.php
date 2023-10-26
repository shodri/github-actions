@extends('layouts.auth')

@section('auth_content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">{{__('Ingresar con mi cuenta')}}</h1>

    <div class="form-floating mb-3">
        <input type="email" name="email" id="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" required autocomplete="email" autofocus
            placeholder="name@example.com">
        <label for="floatingInput">{{ __('Email') }}</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-floating">
        <input type="password" name="password" id="password"
            class="form-control @error('password') is-invalid @enderror" required
            autocomplete="current-password">
        <label for="floatingPassword">{{ __('Clave') }}</label>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row mt-2 px-1 mb-3">
        <div class="col-auto me-auto">
            <div class="form-check mb-0">
                <input class="form-check-input" id="remember" name="remember"
                    type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label mb-0"
                    for="basic-checkbox">{{ __('Recordarme') }}</label>
            </div>
        </div>
        <div class="col-auto">
            <a class=""
                href="{{ route('password.request') }}">{{ __('Olvidé mi clave') }}</a>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">
        {{ __('Ingresar') }}
    </button>

    @if(false && $errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ implode('', $errors->all(':message')) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
    @endif

    <div class="d-grid gap-2 col-8 pt-3 mx-auto">
        <span class="text-center"><b>{{__('¿No eres usuario aún?')}}</b></span>
        <a href="{{ route('register') }}"
            class="btn btn-sm btn-secondary rounded-pill">{{ __('Registrate') }}</a>
    </div>


    <div class="d-grid gap-2 col-8 pt-3 mx-auto">
        <span class="text-center">o bién:</span>
    </div>

    <button class="btn btn-outline-danger w-100 py-2 mb-3" type="submit"> <i
            class="bi bi-facebook"></i> Ingresar con Facebook </button>

    <button class="btn btn-outline-primary  w-100 py-2 mb-3" type="submit"> <i
            class="bi bi-google"></i> Ingresar con Google</button>
</form>
@endsection