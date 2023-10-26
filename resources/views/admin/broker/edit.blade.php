@extends('admin.layout')

@section('styles')
@parent
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css"> 
<style>
.iti {
  width: 100%;
  display: block;
}    

label.cabinet{
    display: block;
	cursor: pointer;
}

label.cabinet input.file{
    position: relative;
	height: 100%;
	width: auto;
	opacity: 0;
	-moz-opacity: 0;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
    margin-top:-30px;
}

label.cabinet figure {
  border: thin #c0c0c0 solid;
  display: flex;
  flex-flow: column;
  padding: 5px;
  # max-width: 150px;
  # max-height: 125px;
  margin: auto;
}

label.cabinet img {
  background-color: lightgrey;
  width: 100%;
  #height: 83%;
}

#imageModal .modal-body {
    min-height: 400px;
    max-height:800px;
}

.imgdiv {
    max-height: 350px !important;
    max-width: 600px !important;
}
</style>   
@endsection

@section('content')
<div class="d-flex justify-content-between mb-3">
        <h2 class="brand-text text-primary ms-1"><b>{{$title}}</b></h2>
        <a href="{{route('admin.brokers.index')}}" class="btn btn-primary">Volver</a>
</div>

@if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>			
@elseif(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>			
@endif	

<form method="post" role="form" action="{{$action}}" enctype="multipart/form-data">
    @csrf
    @if($broker->id)
    @method('PATCH')
    @endif


    <div class="mt-3">

        <div class="row">
            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="name" class="form-label">{{__('NOMBRE DE LA EMPRESA')}}</label>
                <input type="text" id="name" name="name" class="form-control form-control-sm @error('name') is_invalid @enderror" value="{{ old('name', $broker->name) }}" aria-describedby="describeNameField" required>
                <div id="describeNameField" class="form-text">* Que aparecerá en el Perfil</div>
            </div>

            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="status" class="form-label">{{__('ESTADO')}}</label>
                <select id="status" name="status" class="form-select form-select-sm @error('status') is-invalid @enderror" value="{{ old('status', $broker->status) }}" aria-describedby="describestatusField" required>
                    <option value="enabled" {{ (old('status', $broker->status) == 'enabled') ? "selected" : "" }}>Enabled</option>
                    <option value="disabled" {{ (old('status', $broker->status) == 'disabled') ? "selected" : "" }}>Disabled</option>
                </select>
            </div>

        </div>
            
        <div class="row">
            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="address" class="form-label">{{__('DIRECCIÓN')}}</label>
                <input type="text" id="address" name="address" class="form-control form-control-sm @error('address') is_invalid @enderror" value="{{ old('address', $broker->address) }}" aria-describedby="describeAddressField" required>
                <div id="describeAddressField" class="form-text">* Que aparecerá en el Perfil</div>
            </div>
            
            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="city" class="form-label">{{__('CIUDAD')}}</label>
                <input type="text" id="city" name="city" class="form-control form-control-sm @error('city') is_invalid @enderror" value="{{ old('city', $broker->city) }}" aria-describedby="describeCityField" required>
                <div id="describeCityField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
            </div>

            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="state" class="form-label">{{__('ESTADO / PCIA')}}</label>
                <input type="text" id="state" name="state" class="form-control form-control-sm @error('state') is_invalid @enderror" value="{{ old('state', $broker->state) }}" aria-describedby="describeStateField" required>
                <div id="describeStateField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
            </div>
            
            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="country" class="form-label">{{__('PAÍS')}}</label>
                <select id="country" name="country" class="form-select form-select-sm @error('country') is-invalid @enderror" value="{{ old('country', $broker->country) }}" aria-describedby="describeCountryField" required>
                    <option>{{__('Seleccioná')}}</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}" {{ (old('country', $broker->country) == $country->id) ? "selected" : "" }}><i class="flag flag-us"></i> {{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            
        <div class="row">
            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="email" class="form-label">{{__('E-MAIL')}}</label>
                <input type="email" id="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email', $broker->email) }}" aria-describedby="describeEmailField">
                <div id="describeEmailField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
            </div>

            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="phone" class="form-label">{{__('TELÉFONO')}}</label>
                <div class='input-group'>
                    <input type="tel" id='phone' name='phone' class="form-control form-control-sm @error('phone') is-invalid @enderror" value="{{ old('phone', $broker->phone) }}" aria-describedby="describePhoneField">
                </div>
                <div id="describePhoneField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
            </div>
            
            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="whatsapp" class="form-label">{{__('WHATSAPP')}}</label>
                <div class='input-group'>
                    <input type="tel" id='whatsapp' name='whatsapp' class="form-control form-control-sm @error('whatsapp') is-invalid @enderror" value="{{ old('whatsapp', $broker->whatsapp) }}" aria-describedby="describeWhatsappField">
                </div>
                <div id="describeWhatsappField" class="form-text">* {{__('Que aparecerá en el Perfil')}}</div>
            </div>

            <div class="col-lg-3 col-sm-12 mb-3">
                <label for="zipcode" class="form-label">{{__('CÓD. POSTAL')}}</label>
                <div class="input-group">
                    <input type="text" id='zipcode' name='zipcode' class="form-control form-control-sm @error('zipcode') is-invalid @enderror" value="{{ old('zipcode', $broker->zipcode) }}" aria-label="" aria-describedby="describeZipcodeField">
                    <a class="btn btn-sm btn-outline-secondary" href="https://www.google.com/maps" target="_blank" id="validateOnMap"><i class="bi bi-geo-alt me-2"></i>{{__('Validar en mapa')}}</a>
                </div>
                <div id="describeZipcodeField" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
            </div>
        </div>

        <div class='row'>
            <div class="col-lg-12 col-sm-12 mb-3">
                <label for="short_description" class="form-label">{{__('DESCRIPCIÓN CORTA DE LA EMPRESA')}}</label>
                <textarea id="short_description" name="short_description" class="form-control form-control-sm @error('short_description') is-invalid @enderror" rows="3" aria-describedby="describeshort_descriptionField">{{ old('short_description', $broker->short_description) }}</textarea>
                <div id="describeshort_descriptionField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-sm-12 mb-3">
                <label for="long_description" class="form-label">{{__('DESCRIPCIÓN LARGA DE LA EMPRESA')}}</label>
                <textarea id="long_description" name="long_description" class="form-control form-control-sm @error('long_description') is-invalid @enderror" rows="3" aria-describedby="describeLongDescriptionField">{{ old('long_description', $broker->long_description) }}</textarea>
                <div id="describeLongDescriptionField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-3">
                        <label for="url" class="form-label">{{__('SITIO WEB')}}</label>
                        <input type="text" id="url" name="url" class="form-control form-control-sm @error('url') is-invalid @enderror" value="{{ old('url', $broker->url) }}" aria-describedby="describeUrlField">
                        <div id="describeUrlField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
                    </div>
                    
                    <div class="col-lg-6 col-sm-12 mb-3">
                        <label for="brochure" class="form-label">BROCHURE (PDF)</label>
                        @if($broker->brochure)
                        <div class="btn-group d-flex" role="group">
                            <a class='btn btn-outline-secondary btn-sm w-100' href='{{Storage::url($broker->brochure->path)}}' target='_blank'><i class='bi bi-download'> {{__('Descargar')}}</i></a>
                            <button class="btn btn-sm btn-danger" type="button" id="deleteBrochure"><i class='bi bi-trash'></i></button>
                        </div>
                        @else
                        <div class="input-group"> 
                            <input type="file" name="brochure" id="brochure" class="form-control form-control-sm" aria-describedby="describeBrochureField">
                        </div>
                        <div id="describeBrochureField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
                        @endif
                    </div>
                </div>  
                
                <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-3">
                        <label for="specialties" class="form-label">{{__('ESPECIALIDADES')}}</label>
        
                        <div id="specialities"  aria-describedby="describeSpecialtiesField">
                            @foreach($develop_classes as $develop_class)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="speciality[]" value="{{$develop_class->id}}" id="speciality{{$loop->iteration}}" {{ $broker->speciality && in_array($develop_class->id, old('speciality', $broker->speciality)) ? "checked" : "" }}>
                                <label class="form-check-label" for="speciality{{$loop->iteration}}">
                                {{$develop_class->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
        
                        <div id="describeSpecialtiesField" class="form-text">* {{__('Tipos de construcciones que realizas')}}</div>
                    </div>
                    
                    <div class="col-lg-6 col-sm-12 mb-3">
                        <label for="social_networks" class="form-label">{{__('REDES SOCIALES')}}</label>
                        <textarea id="social_networks" name="social_networks" class="form-control form-control-sm @error('social_networks') is-invalid @enderror" rows="3" aria-describedby="describeSocialNetworksField">{{ old('social_networks', $broker->social_networks) }}</textarea>
                        <div id="describeSocialNetworksField" class="form-text">* {{__('Que se publicará en el Perfil')}}</div>
                    </div>
                </div>


            </div>

            <div class="col-lg-2 col-sm-12">
                <label for="pictureFile" class="form-label">{{__('LOGO')}}</label>
                <label class="cabinet">
                    <figure>
                        <img src="{{$broker->image ? Storage::url($broker->image) : 'data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA='}}" class="img-responsive img-thumbnail" id="picture-image" data-src="{{$broker->image}}" />
                        <figcaption>
                            <div class="d-flex justify-content-between">
                                <i class="bi bi-camera"></i>
                                <a id="pictureDelete"><i class="bi bi-trash"></i></a>
                            </div>
                        </figcaption>
                    </figure> 
                    <input type="file" class="item-img file center-block" id="pictureFile" accept="image/*"/>
                    <input type="hidden" name="picture" id="picture"/>
                    <input type="hidden" name="picture_old" value="{{$broker->image}}"/>
                </label> 

            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-md btn-primary mt-2"><i class="bi bi-check-lg ms-1 me-2"></i> {{__('Grabar Cambios')}} </button>
</form>                
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">{{__('Ajustar la imágen')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="showimg  d-flex justify-content-center pt-3" >
            <div class="row imgdiv" id="imgdiv" style="" >
                <img id="image" class="crop_image" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancelar')}}</button>
        <button type="button" class="btn btn-primary" id="btn-crop_image">{{__('Aceptar')}}</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
    const inputPhone = document.querySelector("#phone");
    const inputWhatsapp = document.querySelector("#whatsapp");

    var $modal = $('#imageModal');
    var image = document.getElementById('image');
    var cropper;

    window.intlTelInput(inputPhone, {
        initialCountry: "auto",
        geoIpLookup: callback => {
            fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("ar"));
        },
        //utilsScript: "/intl-tel-input/js/utils.js?1695806485509" // just for formatting/placeholders etc
    });
    window.intlTelInput(inputWhatsapp, {
        initialCountry: "auto",
        geoIpLookup: callback => {
            fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("ar"));
        },
        //utilsScript: "/intl-tel-input/js/utils.js?1695806485509"
    });

    @if($broker->id)
    $('button#deleteBrochure').on('click',function(e) {
        $.confirm({
            title: 'Confirmar',
            content: '{{__('Seguro que desea borrar el brochure?')}}',
            type: 'red',
            closeIcon: true,
            buttons: {
                cancelar: {
                    btnClass: 'btn-danger',
                },
                confirmar: {
                    btnClass: 'btn-primary',
                    action: function () {
                        $('<form/>', {id: 'hiddenForm', method: 'post', action: '{{route('admin.brokers.brochure.delete',$broker->id)}}'})
                            .append('@csrf')
                            .append('@method('DELETE')')
                            .appendTo('body')
                            .submit();
                    },
                },
            }
        });
    });
    @endif

    $("body").on("change", "#pictureFile", function(e){
        console.log('pictureFile change event');
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
            $('input#pictureFile').val('');
        }
    });

    $('#pictureDelete').on('click', function(e) {
        e.preventDefault();
        var original=$('#picture-image').attr('data-src');
        if(original == "") {
            $('#picture-image').attr('src', 'data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=');
            $('#picture').attr('value', 'delete');
        } else {
            $.confirm({
                title: 'Confirmar',
                content: '{{__('Seguro que desea quitar esta imágen?')}}',
                type: 'red',
                closeIcon: true,
                buttons: {
                    cancelar: {
                        btnClass: 'btn-danger',
                    },
                    confirmar: {
                        btnClass: 'btn-primary',
                        action: function () {
                            $('#picture-image')
                                .attr('src', 'data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=')
                                .attr('data-src', "");
                            $('#picture').attr('value', 'delete,'+original);
                        },
                    },
                }
            });
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
        aspectRatio: 16 / 9,        
        viewMode: 0,
        dragMode: 'move',
        preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#btn-crop_image").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob); 
            reader.onloadend = function() {
                var base64data = reader.result; 
                //console.log(base64data);
                $('#picture-image').attr('src', base64data);
                $('#picture').attr('value', base64data);
                $modal.modal('hide');
            }
        });
    })



</script>
@endsection