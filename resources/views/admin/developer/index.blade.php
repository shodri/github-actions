@extends('admin.layout')

@section('styles')
    @parent
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="brand-text text-primary ms-1"><b>Desarrolladoras</b></h4>
        <a href="{{route('admin.developers.create')}}" class="btn btn-primary btn-sm">
            Nueva Desarrolladora
        </a>
    </div>


    <table id="dTable" class="table table-striped compact small" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Domicilio</th>
                <th>País</th>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($developers as $developer)
                <tr data-id="{{$developer->id}}">
                    <td>{{$developer->name}}</td>
                    <td>{{$developer->address}}</td>
                    <td>{{$developer->country}}</td>
                    <td>{{$developer->state}}</td>
                    <td>{{$developer->city}}</td>
                    <td>{{$developer->status}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  	$(document).ready( function () {
        $("#dTable").DataTable({
            order: [[0, 'asc']],
            stateSave: true,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-AR.json'
            },
            columnDefs: [
                { 
                    targets: 6, 
                    sercheable: false, 
                    orderable: false, 
                    render: function ( data, type, row, meta ) {
                        return '<div class="dropdown"> \
                                    <button class="btn btn-xs" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button> \
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink"> \
                                        <li><a class="dropdown-item record-edit">Editar</a></li> \
                                        <li><a class="dropdown-item record-delete">Borrar</a></li> \
                                    </ul> \
                                </div>';
                    }
                }
            ],
        });
        $("table tbody tr .record-delete").on("click", function(e){
            var tr = $( this ).closest('tr');
            var id = tr.attr('data-id');
            if(id) {
                $.confirm({
                    title: 'Confirmar',
                    content: 'Seguro que desea eliminar los datos de la desarrolladora &lt;' + tr.children()[0].innerText + '&gt;?',
                    type: 'red',
                    closeIcon: true,
                    buttons: {
                        cancelar: {
                            btnClass: 'btn-danger',
                        },
                        confirmar: {
                            btnClass: 'btn-primary',
                            action: function () {
                                var url = "{{route('admin.developers.destroy',':id')}}";
                                $('<form/>', {id: 'hiddenForm', method: 'post', action: url.replace(':id', id)})
                                    .append('@csrf')
                                    .append('@method('DELETE')')
                                    .appendTo('body')
                                    .submit();
                            },
                        },
                    }
                });

            }
        });
        $("table tbody tr .record-edit").on("click", function(e) {
            var tr = $( this ).closest('tr');
            var id = tr.attr('data-id');
            var url = "{{route('admin.developers.edit',':id')}}";
            window.location.href = url.replace(':id',id);
        });

        $('body').remove('form#hiddenForm');
	});
</script>
@endsection
