@extends('layouts.auth')

@section('auth_content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">{{__('Registro de cuenta')}}</h1>

    <div class="form-floating mb-3">
        <input type="text" name="name" id="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}" required autocomplete="name" autofocus>
        <label for="floatingInput">{{ __('Nombre') }}</label>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="email" name="email" id="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" required autocomplete="email" autofocus
            placeholder="name@example.com">
        <label for="floatingInput">{{ __('Email') }}</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
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
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-floating">
        <input type="password" name="password_confirmation" id="password_confirmation"
            class="form-control" required
            autocomplete="confirm-password">
        <label for="floatingPassword">{{ __('Confirmar clave') }}</label>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">
        {{ __('Completar el registro') }}
    </button>

    <div class="d-grid gap-2 col-8 pt-3 mx-auto">
        <span class="text-center"><b>{{__('Ya tienes un usuario registrado?')}}</b></span>
        <a href="{{ route('login') }}"
            class="btn btn-sm btn-secondary rounded-pill">{{ __('Utilizalo para ingresar') }}</a>
    </div>
</form>
@endsection