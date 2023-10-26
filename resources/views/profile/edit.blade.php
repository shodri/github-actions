@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
	<div class="p-lg-4">
		
		<div class="row mb-3 mt-6">

			<div class="col-lg-9">
			
				<form method="post" action="{{ route('profile.update') }}">
        			@csrf
        			@method('patch')

					<h4 class="yank fw-normal mb-0"><i class="bi bi-person me-2"></i> {{__('Datos Personales')}}</h4>
					<p class="mb-2">{{__('Completá la información del perfil')}}</p>
				
					<div class="row">
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="email" class="form-label">{{__('E-MAIL / USUARIO')}}</label>
							<div class="input-group"> 
								<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"  aria-label="{{__('nombre de usuario')}}" aria-describedby="describeEmailField" disabled>
								<button class="btn btn-outline-secondary" type="button" id="buttonChangeEmail">{{__('Cambiar')}}</button>
							</div>
							<div id="describeEmailField" class="form-text">* {{__('Es el mail con el que te registraste')}}</div>
						</div>
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="name" class="form-label">{{__('NOMBRE Y APELLIDO')}}</label>
							<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autocomplete="name" aria-describedby="describeNameField">
							<div id="describeNameField" class="form-text">* {{__('Para que te llegue información personalizada')}}</div>
						</div>
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="whatsapp" class="form-label">{{__('WHATSAPP')}}</label>
							<div class="input-group" id='whatsapp'>
								<select class="form-select @error('whappcode') is-invalid @enderror" id="whappcode" name="whappcode">
								<option selected>{{__('Cód.')}}</option>
								@foreach($calling_codes as $calling_code)
									<option value="{{$calling_code}}" {{ (old('whappcode', $user->whappcode) == $calling_code) ? "selected" : "" }}>+{{$calling_code}}</option>
								@endforeach
								</select>
								<input type="text" id='whappnum' name='whappnum' class="form-control @error('whappnum') is-invalid @enderror" value="{{ old('whappnum', $user->whappnum) }}" placeholder="{{__('Número')}}" aria-describedby="describeWhappNumField">
							</div>
							<div id="describeWhappNumField" class="form-text">* {{__('Para que te envíen comunicaciones')}}</div>
						</div>
					</div>
				
					<div class="row">
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="birthdate" class="form-label">{{__('FECHA DE NACIMIENTO')}}</label>
							<input type="date" id="birthdate" name='birthdate' class="form-control  @error('birthdate') is-invalid @enderror" value="{{ old('birthdate', $user->birthdate) }}" min='{{config('my-data.birthdate.min')}}' max='{{config('my-data.birthdate.max')}}' aria-describedby="describeBirthdateField">
							<div id="describeBirthdateField" class="form-text">* {{__('Para enviarte información personalizada')}}</div>
						</div>
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="language" class="form-label">{{__('LENGAJE')}}</label>
							<select name="language" id="language" class="form-select @error('language') is-invalid @enderror" aria-describedby="describeLanguageField">
							<option>{{__('Seleccioná')}}</option>
							@foreach($languages as $language)
								<option value="{{$language->id}}" {{ (old('language', $user->language) == $language->id) ? "selected" : "" }}>{{$language->native_name}}</option>
							@endforeach
							</select>
							<div id="describeLanguageField" class="form-text @error('company') is-invalid @enderror">* {{__('Para que te envíen comunicaciones')}}</div>
						</div>

						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="company" class="form-label">{{__('EMPRESA')}}</label>
							<input type="text" id="company" name="company" class="form-control" value="{{ old('company', $user->company) }}" aria-describedby="describeCompanyField">
							<div id="describeCompanyField" class="form-text">* {{__('Si pertenecés a alguna')}}</div>
						</div>

					</div>
					
					<div class="row">
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="country" class="form-label">{{__('PAÍS')}}</label>
							<select id="country" name="country" class="form-select @error('country') is-invalid @enderror" value="{{ old('country', $user->country) }}" aria-describedby="describeCountryField">
							<option>{{__('Seleccioná')}}</option>
							@foreach($countries as $country)
								<option value="{{$country->id}}" {{ (old('country', $user->country) == $country->id) ? "selected" : "" }}><i class="flag flag-us"></i> {{$country->name}}</option>
							@endforeach
							</select>
							<div id="describeCountryField" class="form-text">* {{__('Para enviarte información personalizada')}}</div>
						</div>

						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="state" class="form-label">{{__('PROVINCIA')}}</label>
							<input type="text" id='state' name='state' class="form-control @error('state') is_invalid @enderror" value="{{ old('state', $user->state) }}" aria-describedby="describeStateField">
							<div id="describeStateField" class="form-text">* {{__('Para que te envíen comunicaciones')}}</div>
						</div>

						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="city" class="form-label">{{__('CIUDAD')}}</label>
							<input type="text" id='city' name='city' class="form-control @error('city') is_invalid @enderror" value="{{ old('city', $user->city) }}" aria-describedby="describeCityField">
							<div id="describeCityField" class="form-text">* {{__('Para que te envíen comunicaciones')}}</div>
						</div>
					</div>

					<div class="d-flex justify-content-center justify-content-lg-start">
						<button type="submit" class="btn btn-md btn-primary mt-3 mb-5"><i class="bi bi-check-lg ms-1 me-2"></i> {{__('Grabar Cambios')}} </button>
					</div>

				</form>
			</div>
		
			<div class="col-sm-12 col-lg-3 text-center">
			
				<div class="card mb-4">
					<div class="profile">
						<div class="position-relative d-inline-block">
							<img src="/images/usuarioBG.jpg" class="img-fluid">
							<div class="about-experience">
								<img class="rounded-circle " src="{{asset('/storage/images/'.(Auth::user()->picture ?? '_profile-no.jpg'))}}">
							</div>
						</div>
					</div>
					<p class="mt-5 mb-2">Tu pefil está completo al <span class="fw-bold">60 %</span>
					<br/>
					<a href="{{ route('profile.avatar') }}">{{_('Cambiar imágen')}}</a>
				</div>
				
				
				
				<h3 class="yank display-8  fw-normal">Usos de Onpropify</h3>
				<h6 class="text-center mb-3">¿Que rol desempeñas en esta comunidad?</h6>
				<a class="btn btn-info btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="{{ route('profile.developer') }}"><i class="bi bi-building me-2"></i> Soy Desarrollador</a>
				<a class="btn btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="add"><i class="bi bi-house-check me-2"></i> Soy Inmobiliaria</a>
				<a class="btn btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="add"><i class="bi bi-person-square me-2"></i> Soy Agente</a>
				<a class="btn btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="add"><i class="bi bi-person-gear me-2"></i> Soy Proveedor</a>
				
			</div>
			
		</div>
	</div>
</div>
@endsection