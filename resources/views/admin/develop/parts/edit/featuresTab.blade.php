<div class="tab-pane fade active show" id="tab-car" role="tabpanel" aria-labelledby="car-tab">

    <h4 class="yank display-10  fw-normal mb-2">{{__('Características')}}</h4>
    <p class="mb-4">{{__('Completá la información básica del desarrollo')}}</p>

    <div class="row">

        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="name" class="form-label">{{__('NOMBRE o TÍTULO DEL DESRROLLO')}}</label>
            <input type="text" id="name" name="name" 
				class="form-control form-control-sm @error('name') is_invalid @enderror" 
				value="{{ old('name', $develop->name) }}"
                aria-describedby="nameDescribe">
            <div id="nameDescribe" class="form-text">* {{__('Que identificará el desarrollo')}}</div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="status" class="form-label">{{__('Publicado')}}</label>
            <select id="status" name="status" class="form-select form-select-sm" required>
				@foreach(array('published'=>'Publicado','hidden'=>'Oculto') as $key => $status)
					<option value="{{$key}}" {{ (old('status', $develop->status) == $key) ? "selected" : "" }}>{{$status}}</option>
				@endforeach
			</select>
            <div id="statusDescrip" class="form-text">* {{__('Si decidís que aparezca en el sitio')}}</div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="dtype_id" class="form-label">{{__('Tipo de Proyecto')}}</label>
            <input type="text" disabled 
				class="form-control form-control-sm" 
				value="{{ $develop->dtype->name }}"
                aria-describedby="dtypeDescribe">
            <input type='hidden' name='dtype_id' value='{{$develop->dtype_id}}'>
            <div id="dtypeDescribe" class="form-text">* {{__('Tipo de desarrollo')}}</div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="address" class="form-label">{{__('DIRECCIÓN (Calle, Altura)')}}</label>
            <input type="text" id="address" name="address" 
				class="form-control form-control-sm @error('address') is_invalid @enderror" 
				value="{{ old('address', $develop->address) }}"
                aria-describedby="addressDescribe">
            <div id="addressDescribe" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="city" class="form-label">{{__('CIUDAD')}}</label>
            <input type="text" id="city" name="city" class="form-control form-control-sm @error('city') is_invalid @enderror" value="{{ old('city', $develop->city) }}" aria-describedby="cityDescribe" required>
            <div id="cityDescribe" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
            </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="state" class="form-label">{{__('PROVINCIA / ESTADO')}}</label>
            <input type="text" id="state" name="state" class="form-control form-control-sm @error('state') is_invalid @enderror" value="{{ old('state', $develop->state) }}" aria-describedby="stateDescribe" required>
            <div id="stateDescribe" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="country" class="form-label">{{__('PAÍS')}}</label>
            <select id="country" name="country" class="form-select form-select-sm @error('country') is-invalid @enderror" value="{{ old('country', $develop->country) }}" aria-describedby="countryDescribe" required>
                <option value=''>{{__('Seleccioná')}}</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}" {{ (old('country', $develop->country) == $country->id) ? "selected" : "" }}><i class="flag flag-us"></i> {{$country->name}}</option>
                @endforeach
            </select>
            <div id="countryDescribe" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="zipcode" class="form-label">{{__('Código postal')}}</label>
            <div class="input-group">
                <div class="input-group">
                    <input type="text" id='zipcode' name='zipcode' class="form-control form-control-sm @error('zipcode') is-invalid @enderror" value="{{ old('zipcode', $develop->zipcode) }}" aria-label="" aria-describedby="zipcodeDescribe">
                    <a class="btn btn-sm btn-outline-secondary" href="https://www.google.com/maps" target="_blank" id="validateOnMap"><i class="bi bi-geo-alt me-2"></i>{{__('Validar en mapa')}}</a>
                </div>
            </div>
            <div id="zipcodeDescribe" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="architect" class="form-label">{{__('AQUITECTO')}}</label>
            <input type="text" id="architect" name="architect"
                class="form-control form-control-sm @error('architect') is_invalid @enderror" 
				value="{{ old('architect', $develop->architect) }}"
                aria-describedby="architectDescribe">
            <div id="architectDescribe" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
        </div>

        <div class="col-lg-12 col-sm-12 mb-3">
            <label for="description" class="form-label">{{__('DESCRIPCIÓN CORTA DEL DESARROLLO')}}</label>
            <textarea id="description" name="description" rows="2" 
                class="form-control form-control-sm @error('description') is_invalid @enderror">{{ old('description', $develop->description) }}</textarea>
            <div id="descriptionDescribe" class="form-text">*</div>
        </div>
        <div class="col-lg-12 col-sm-12 mb-3">
            <label for="details" class="form-label">{{__('DETALLES DEL DESARROLLO')}}</label>
            <textarea id="details" name="details" rows="2" 
                class="form-control form-control-sm @error('details') is_invalid @enderror">{{ old('details', $develop->details) }}</textarea>
            <div id="detailsDescribe" class="form-text">*</div>
        </div>
        <div class="col-lg-12 col-sm-12 mb-3">
            <label for="payment_modes" class="form-label">{{__('Formas de pago y financiación')}}</label>
            <textarea id="payment_modes" name="payment_modes" rows="2" 
                class="form-control form-control-sm @error('payment_modes') is_invalid @enderror">{{ old('payment_modes', $develop->payment_modes) }}</textarea>
            <div id="paymentModesDescribe" class="form-text">*</div>
        </div>

    </div>

</div>
