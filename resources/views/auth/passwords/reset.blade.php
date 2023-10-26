@extends('layouts.auth')

@section('auth_content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $token }}">

    <h1 class="h3 mb-3 fw-normal">{{__('Restablecer contraseña')}}</h1>

    <div class="form-floating mb-3">
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
        <label for="floatingInput">{{ __('Email') }}</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-floating">
        <input type="password" name="password" id="password"
            class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
        <label for="floatingPassword">{{ __('Clave') }}</label>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-floating">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required
            autocomplete="confirm-password">
        <label for="floatingPassword">{{ __('Confirmar clave') }}</label>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">
        {{ __('Restablecer mi clave') }}
    </button>
</form>
@endsection