@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('title') Listado de Médicos @stop
@section('top_title') @lang('global.clients.title') @stop
@section('top_button') 
<a href="{{ route('admin.medicos.create') }}" class="btn btn-success btn-sm">@lang('global.app_add_new')</a>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <table id="example" class="table dataTable display table-striped table-bordered compact" width="100%">
            <thead>
                <tr>
                    <th>@lang('global.medicos.fields.paterno')</th>
                    <th>@lang('global.medicos.fields.materno')</th>
                    <th>@lang('global.medicos.fields.nombre')</th>
                    <th>Especialidad</th>
                    <th>Teléfono</th>
                    <th>Fecha de registro </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entities as $entity)
                    <tr data-entry-id="{{ $entity->id }}">
                        <td>{{ $entity->paterno }}</td>
                        <td>{{ $entity->materno }}</td>
                        <td>{{ $entity->nombre }}</td>
                        <td>{{ $entity -> especialidad }}</td>
                        <td>{{ $entity -> telefono }}</td>
                        <td>{{ Carbon\Carbon::parse($entity->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.medico.reset-password',[$entity -> id]) }}" class="btn btn-sm btn-sm-brand btn-primary"> 
                                <i class="fa fa-send"></i> Reset Password
                            </a>
                            <a href="{{ route('admin.medicos.show',[$entity->id]) }}" class="btn btn-sm btn-sm-brand btn-brand"> <i class="fa fa-eye"></i> Ver</a> 
                            <a href="{{ route('admin.medicos.edit',[$entity->id]) }}" class="btn btn-sm btn-sm-brand btn-secondary"> <i class="fa fa-pencil"></i> Editar</a> 
                            <a href="javascript:void(0)" class="btn btn-sm btn-sm-brand btn-warning delete"> <i class="fa fa-trash"></i> Borrar</a> 
                            {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'route' => ['admin.medicos.destroy', $entity->id])) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('javascripts_extra') 
<script type="text/javascript">
        $(function(){
               $("a.delete").click(function() {
                swal({
                  title: "Esta seguro de eliminar?",
                  text: "Una vez eliminado, este registro se perderá y no podra ser recuperado.",
                  icon: "warning",
                  buttons: ["Cancelar", "OK"],
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $(this).next('form').submit();
                  } else {
                    swal("Su registro esta a salvo, no se elimino nada.");
                  }
                });
            });
            $("a.annul").click(function() {
                swal({
                  title: "Esta seguro de anular esta factura?",
                  text: "Una vez anulado, esta factura solo se podra ver, no se podra enviar por email, ni tampoco se podra editar.",
                  icon: "info",
                  buttons: ["Cancelar", "OK"],
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    --$(this).next('form').submit();
                  } else {
                    swal("Su factura esta a salvo, no se anulo.");
                  }
                });
            });
          $('#example').DataTable( {
                "pagingType": "full",
                "order": [[ 0, "desc" ]],
                "paging":   true,
                "ordering": true,
                "info":     true,
                responsive: {
                    details: false
                },
                "language": {
                    "decimal":        "",
                    "emptyTable":     "No hay datos disponibles",
                    "info":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 de 0 de un total de 0 registros",
                    "infoFiltered":   "(filtrados de un total de _MAX_ registros)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "No hay resultados de búsqueda",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            } );
        } );
    </script>
@endsection