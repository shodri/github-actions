@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
	<div class="p-lg-4">
		
		<div class="row mb-3">

			<div class="col-lg-9">
			
				<h4 class="yank fw-normal mb-0"><i class="bi bi-key me-2"></i> {{__('Cambiar Clave')}}</h4>
				<p class="mb-2">{{__('La siguiente es la clave que te permite acceder a Onpropify')}}</p>

                <form method="POST" action="{{ route('password.put') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT')
				
					<div class="row">
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="current_password" class="form-label">{{__('Clave actual')}}</label>
                            <input type="password" id="current_password" name="current_password" class="form-control form-control-sm @error('current_password') is-invalid @enderror" required autocomplete="current-password" autofocus>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="password" class="form-label">{{__('Nueva Clave')}}</label>
                            <input type="password" id="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" required  autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="password-confirm" class="form-label">{{__('Repetir Nueva Clave')}}</label>
                            <input type="password" id="password-confirm"  name="password_confirmation"class="form-control form-control-sm" required autocomplete="new-password">
						</div>
					</div>

                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <button type="submit" class="btn btn-md btn-primary mt-3 mb-5">
                            <i class="bi bi-check-lg ms-1 me-2"></i> {{__('Cambiar Clave')}} 
                        </button>
    				</div>

                    @if (session('status') === 'password-updated')
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ __('La clave fue modificada exitosamente') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </form>
				
			</div>
		
            @include('profile.partials.right-part')
		</div>
	</div>


</div>
@endsection