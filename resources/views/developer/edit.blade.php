@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
	<div class="p-lg-4">
		
		<div class="row mb-3">

			<div class="col-lg-9">
			
				<h4 class="yank fw-normal mb-0"><i class="bi bi-building me-2"></i> {{__('Datos de la Desarrolladora')}}</h4>
				<p class="mb-2">{{__('Completá la información del perfil')}}</p>

				@if($errors->any())
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{!! implode('', $errors->all('<div>:message</div>')) !!}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>			
				@endif	
							

				<form method="post" role="form" action="{{ route('developers.store') }}">
        			@csrf

				    <div class="mt-3">
				
						<div class="row">
						
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="name" class="form-label">{{__('NOMBRE DE LA EMPRESA')}}</label>
								<input type="text" id="name" name="name" class="form-control form-control-sm @error('name') is_invalid @enderror" value="{{ old('name', $developer->name) }}" aria-describedby="describeNameField" required>
								<div id="describeNameField" class="form-text">* Que aparecerá en el Perfil</div>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="address" class="form-label">{{__('DIRECCIÓN')}}</label>
								<input type="text" id="address" name="address" class="form-control form-control-sm @error('address') is_invalid @enderror" value="{{ old('address', $developer->address) }}" aria-describedby="describeAddressField" required>
								<div id="describeAddressField" class="form-text">* Que aparecerá en el Perfil</div>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="city" class="form-label">{{__('CIUDAD')}}</label>
								<input type="text" id="city" name="city" class="form-control form-control-sm @error('city') is_invalid @enderror" value="{{ old('city', $developer->city) }}" aria-describedby="describeCityField" required>
                                <div id="describeCityField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
							</div>

							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="state" class="form-label">{{__('ESTADO / PCIA')}}</label>
								<input type="text" id="state" name="state" class="form-control form-control-sm @error('state') is_invalid @enderror" value="{{ old('state', $developer->state) }}" aria-describedby="describeStateField" required>
								<div id="describeStateField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
                                <label for="country" class="form-label">{{__('PAÍS')}}</label>
                                <select id="country" name="country" class="form-select @error('country') is-invalid @enderror" value="{{ old('country', $developer->country) }}" aria-describedby="describeCountryField" required>
                                    <option>{{__('Seleccioná')}}</option>
                                    @foreach($countries as $country)
		        						<option value="{{$country->id}}" {{ (old('country', $developer->country) == $country->id) ? "selected" : "" }}><i class="flag flag-us"></i> {{$country->name}}</option>
        							@endforeach
								</select>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="zipcode" class="form-label">{{__('Código postal')}}</label>
								<div class="input-group">
								  <input type="text" id='zipcode' name='zipcode' class="form-control form-control-sm @error('zipcode') is-invalid @enderror" value="{{ old('zipcode', $developer->zipcode) }}" aria-label="" aria-describedby="describeZipcodeField">
								  <a class="btn btn-sm btn-outline-secondary" href="https://www.google.com/maps" target="_blank" id="validateOnMap"><i class="bi bi-geo-alt me-2"></i>{{__('Validar en mapa')}}</a>
								</div>
								<div id="describeZipcodeField" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="email" class="form-label">{{__('E-MAIL')}}</label>
								<input type="email" id="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email', $developer->email) }}" aria-describedby="describeEmailField">
								<div id="describeEmailField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="phonenum" class="form-label">{{__('TELÉFONO')}}</label>
								<div class="input-group input-group-sm">
								    <select class="form-select @error('phonecode') is-invalid @enderror" id="phonecode" name="phonecode">
                                    <option selected>{{__('Cód.')}}</option>
                                    @foreach($calling_codes as $calling_code)
                                        <option value="{{$calling_code}}" {{ (old('phonecode', $developer->phonecode) == $calling_code) ? "selected" : "" }}>+{{$calling_code}}</option>
                                    @endforeach
                                    </select>
                                    <input type="text" id='phonenum' name='phonenum' class="form-control form-control-sm @error('phonenum') is-invalid @enderror" value="{{ old('phonenum', $developer->phonenum) }}" placeholder="{{__('Número')}}" aria-describedby="describePhoneNumField">
								</div>
								<div id="describePhoneNumField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="whappnum" class="form-label">Whatsapp</label>
								<div class="input-group input-group-sm">
								<select class="form-select @error('whappcode') is-invalid @enderror" id="whappcode" name="whappcode">
								<option selected>{{__('Cód.')}}</option>
								@foreach($calling_codes as $calling_code)
									<option value="{{$calling_code}}" {{ (old('whappcode', $developer->whappcode) == $calling_code) ? "selected" : "" }}>+{{$calling_code}}</option>
								@endforeach
								</select>
                                <input type="text" id='whappnum' name='whappnum' class="form-control form-control-sm @error('whappnum') is-invalid @enderror" value="{{ old('whappnum', $developer->whappnum) }}" placeholder="{{__('Número')}}" aria-describedby="describeWhappNumField">
								</div>
								<div id="describeWhappNumField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
							</div>

							<div class="col-lg-12 col-sm-12 mb-3">
								<label for="short_description" class="form-label">{{__('DESCRIPCIÓN CORTA DE LA EMPRESA')}}</label>
								<textarea id="short_description" name="short_description" class="form-control form-control-sm @error('short_description') is-invalid @enderror" rows="3" aria-describedby="describeshort_descriptionField">
                                    {{ old('short_description', $developer->short_description) }}
                                </textarea>
								<div id="describeshort_descriptionField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
							</div>

							<div class="col-lg-12 col-sm-12 mb-3">
								<label for="long_description" class="form-label">{{__('DESCRIPCIÓN LARGA DE LA EMPRESA')}}</label>
								<textarea id="short_description" name="short_description" class="form-control form-control-sm @error('long_description') is-invalid @enderror" rows="3" aria-describedby="describelong_descriptionField">
                                    {{ old('long_description', $developer->long_description) }}
                                </textarea>
								<div id="describelong_descriptionField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
							</div>

							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="url" class="form-label">{{__('SITIO WEB')}}</label>
								<input type="text" id="url" name="url" class="form-control form-control-sm @error('url') is-invalid @enderror" value="{{ old('url', $developer->url) }}" aria-describedby="describeUrlField">
								<div id="describeUrlField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">BROCHURE (PDF)</label>
								<div class="input-group"> 
									<input type="text" class="form-control form-control-sm" placeholder="Buscar" aria-label="Recipient's developername" aria-describedby="button-addon2">
									<button class="btn btn-sm btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
								</div>
								<div id="emailHelp" class="form-text">* Que se publicará en el Perfil</div>
							</div>
							
							<div class="col-lg-4 col-sm-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">IMAGEN DE PERFIL</label>
								<div class="input-group"> 
									<input type="text" class="form-control form-control-sm" placeholder="Buscar" aria-label="Recipient's developername" aria-describedby="button-addon2">
									<button class="btn btn-sm btn-outline-secondary" type="button" id="button-addon2">Cambiar</button>
								</div>
								<div id="emailHelp" class="form-text">* Que se publicará en el Perfil</div>
							</div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-6 mb-3">
                                    <label for="specialties" class="form-label">{{__('ESPECIALIDADES')}}</label>

                                    <div id="specialities"  aria-describedby="describeSpecialtiesField">
                                        @foreach($specialities as $speciality)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="speciality[]" value="{{strtolower($speciality)}}" id="speciality{{$loop->iteration}}">
                                            <label class="form-check-label" for="speciality{{$loop->iteration}}">
                                            {{$speciality}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div id="describeSpecialtiesField" class="form-text">* {{__('Tipos de construcciones que realizas')}}</div>
                                </div>
                                
                                <div class="col-lg-6 col-sm-6 mb-3">
                                    <label for="socialNetworks" class="form-label">{{__('REDES SOCIALES')}}</label>
                                    <textarea id="socialNetworks" name="socialNetworks" class="form-control form-control-sm @error('socialNetworks') is-invalid @enderror" rows="3" aria-describedby="describeSocialNetworksField">
                                        {{ old('socialNetworks', $developer->socialNetworks) }}
                                    </textarea>
                                    <div id="describeSocialNetworksField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
                                </div>
                            </div>

						</div>
						
				    </div>
	
				    <button type="submit" class="btn btn-md btn-primary mt-2"><i class="bi bi-check-lg ms-1 me-2"></i> {{__('Grabar Cambios')}} </button>
                </form>                
			</div>
					
			<div class="col-sm-12 col-lg-3 text-center">
				<div class="card mb-4">
					<div class="profile">
						<div class="position-relative d-inline-block">
							<img src="../images/usuarioBG.jpg" class="img-fluid">
							<div class="about-experience">
								<img class="" src="../images/logo-des.png">
							</div>
						</div>
					</div>
					<p class="mt-5 mb-2">El pefil está completo al <span class="fw-bold">60 %</span>

					
					<div class="d-grid mx-auto mb-3">
					<a class="btn btn-sm btn-outline-secondary rounded-pill" href="../_front/perfil" target="_blank"><i class="bi bi-window-fullscreen me-2"></i> Ver página de Perfil</a>
					</div>
				</div>
				
				
				<h3 class="yank display-8  fw-normal">Usos de Onpropify</h3>
				<h6 class="text-center mb-3">¿Que rol desempeñas en esta comunidad?</h6>
				<a class="btn btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="add"><i class="bi bi-person-circle me-2"></i> Soy Inversor</a>
				<a class="btn btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="add"><i class="bi bi-building me-2"></i> Soy Desarrollador</a>
				<a class="btn btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="add"><i class="bi bi-house-check me-2"></i> Soy Inmobiliaria</a>
				<a class="btn btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="add"><i class="bi bi-person-square me-2"></i> Soy Agente</a>
				<a class="btn btn-sm btn-outline-secondary rounded-pill mb-2 w-75" href="add"><i class="bi bi-person-gear me-2"></i> Soy Proveedor</a>
			</div>
				
			</div>
		</div>
	</div>
</div>

@endsection