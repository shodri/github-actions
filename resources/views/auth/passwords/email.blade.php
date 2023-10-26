@extends('layouts.auth')

@section('auth_content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <!-- Password Reset Token -->
    <h1 class="h3 mb-3 fw-normal">{{__('Olvidé mi clave')}}</h1>

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

    <button type="submit" class="btn btn-primary w-100 py-2">
        {{ __('Enviarme el link para restablecer mi clave') }}
    </button>
</form>
@endsection