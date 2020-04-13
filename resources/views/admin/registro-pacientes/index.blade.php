@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('title') Listado de Registros de Pacientes @stop
@section('top_title') @lang('global.registro-pacientes.title') @stop
@section('top_button') 
<a href="{{ route('admin.registro-pacientes.create') }}" class="btn btn-success btn-sm">@lang('global.app_add_new')</a>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <table id="example" class="table dataTable display table-striped table-bordered compact" width="100%">
            <thead>
                <tr>
                    <th>@lang('global.registro-pacientes.fields.fecha_registro')</th>
                    <th>@lang('global.registro-pacientes.fields.medico_id')</th>
                    <th>@lang('global.registro-pacientes.fields.paciente_id')</th>
                    <th>@lang('global.registro-pacientes.fields.municipio_id')</th>
                    <th>@lang('global.registro-pacientes.fields.sintomas')</th>
                    <th>@lang('global.registro-pacientes.fields.diagnostico')</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entities as $entity)
                    <tr data-entry-id="{{ $entity->id }}">
                        <td>{{ Carbon\Carbon::parse($entity->fecha_registro)->format('d/m/Y') }}</td>
                        <td>{{ $entity -> medico -> fullname }}</td>
                        <td>{{ $entity -> paciente -> fullname }}</td>
                        <td>{{ $entity -> municipio -> fullname }}</td>
                        <td>{{ $entity -> sintomas }}</td>
                        <td>{{ $entity -> diagnostico }}</td>
                        <td>
                            <a href="{{ route('admin.registro-pacientes.show',[$entity->id]) }}" class="btn btn-sm btn-sm-brand btn-brand"> <i class="fa fa-eye"></i> Ver</a> 
                            <a href="{{ route('admin.registro-pacientes.edit',[$entity->id]) }}" class="btn btn-sm btn-sm-brand btn-secondary"> <i class="fa fa-pencil"></i> Editar</a> 
                            <a href="javascript:void(0)" class="btn btn-sm btn-sm-brand btn-warning delete"> <i class="fa fa-trash"></i> Borrar</a> 
                            {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'route' => ['admin.registro-pacientes.destroy', $entity->id])) !!}
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