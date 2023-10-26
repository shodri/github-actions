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
<div class="col-auto">
    <h4 class="yank fw-normal mb-0"><i class="bi bi-buildings me-2"></i> Detalles del Desarrollo</h4>
    <p class="mb-2">Completá la información detallada del desarrollo</p>
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
    @if($develop->id)
    @method('PATCH')
    @endif

    @include('admin.develop.parts.edit.tabsMenu')
    <div class="tab-content mt-3" id="myTabContent">
        @include('admin.develop.parts.edit.featuresTab')
        @include('admin.develop.parts.edit.multimediaTab')
        @include('admin.develop.parts.edit.amenitiesTab')
        @include('admin.develop.parts.edit.stagesTab')
        @include('admin.develop.parts.edit.propertiesTab')
        @include('admin.develop.parts.edit.brokersTab')
        @include('admin.develop.parts.edit.providersTab')
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
        <input type='hidden' name='src' value=''>
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
    var $modal = $('#imageModal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", "input.pictureFile", function(e){
        var cabinet = $( this ).closest('label.cabinet');
        var src = cabinet.attr('id');
        console.log('pictureFile change '+src);
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.find('input[name=src]').val(src);
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
            $(this).val('');
        }
    });

    $('.pictureDelete').on('click', function(e) {
        e.preventDefault();
        var cabinet = $( this ).closest('label.cabinet');
        var src = cabinet.attr('id');
        //console.log('pictureDelete '+src);
        var original=cabinet.find('input.pictureOriginal').val();
        if(original == "") {
            cabinet.find('figure img.picture-image').attr('src', '/images/detalle-add.jpg');
            cabinet.find('input.picture').attr('value', 'delete');
            cabinet.find('figure figcaption a.pictureDelete').css('display','none');
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
                            cabinet.find('figure img.picture-image').attr('src', '/images/detalle-add.jpg');
                            cabinet.find('input.picture').attr('value', 'delete,'+original);
                            cabinet.find('figure figcaption a.pictureDelete').css('display','none');
                        },
                    },
                }
            });
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
        aspectRatio: 5 / 4,        
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
            width: 195,
            height: 156,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob); 
            reader.onloadend = function() {
                var base64data = reader.result; 
                //console.log(base64data);
                var src = $modal.find('input[name=src]').val();
                var cabinet = $('label.cabinet#'+src);
                cabinet.find('figure img.picture-image').attr('src', base64data);
                cabinet.find('input.picture').attr('value', base64data);
                cabinet.find('figure figcaption a.pictureDelete').css('display','block');
                $modal.find('input[name=src]').val('');
                $modal.modal('hide');
            }
        });
    })



</script>
@endsection