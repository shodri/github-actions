@extends('admin.layout')

@section('content')

<form method="post" role="form" action="{{route('admin.develops.setType')}}">
    @csrf

    <div class="col-md-8 col-sm-12 container justify-content-center mt-4">
    <div class="card">
        <div class="card-header">
            CREAR NUEVO DESARROLLO
        </div>
        <div class="card-body">
	        <p>Definí a continuación las características de este nuevo desarrollo:</p>

            @if($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>			
            @endif	

            <div class="row mb-3">
                <div class="col-sm-12 col-lg-6">
                    <div class="form-floating mb-2">
                        <select class="form-select form-control-lg" name="dclass" id="dclass" aria-label="Clase" style="border:1px solid #474747;">
                            @foreach ($develop_classes as $dclass)
                                <option value="{{$dclass->id}}">{{$dclass->name}}</option>                                
                            @endforeach
                        </select>
                        <label for="dclass">Clase de Desarrollo</label>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-6">
                    <div class="form-floating mb-2">
                        <select class="form-select form-control-lg" name="dtype" id="dtype" aria-label="Tipo" style="border:1px solid #474747;">
                        </select>
                        <label for="dclass">Tipo de Desarrollo</label>
                    </div>
                </div>
                
            </div>

        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-sm btn-outline-secondary action"> CANCELAR </button>
            <button type="submit" class="btn btn-sm btn-primary"> CREAR DESARROLLO </button>
        </div>
    </div>
    </div>

</form>    
@endsection

@section('scripts')
@parent
<script>
$(function() {
    $('select#dclass').on('change', function(e) {
        e.preventDefault();
        var class_id = $(this).val();
        $.ajax({
            method: "GET",
            url: "{{url('/dtype/json')}}/" + class_id,
            dataType: 'json',
            success: function(response) {
                $('select#dtype').empty();
                $.each(response, function(index, data) {
                    $('select#dtype').append('<option value="' + data['id'] +
                        '">' + data['name'] + '</option>');
                });
            }
        });
    }).trigger('change');
})
</script>
@endsection