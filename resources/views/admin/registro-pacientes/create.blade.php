@extends('layouts.app')
@section('title') Nuevo Registro de Paciente @stop
@section('content')
<div class="card" id="facturaForm">
    <div class="card-header">
        <strong class="card-title">Nuevo Registro de Paciente</strong>
    </div>
    <div class="card-body">
    {!! Form::open(['method' => 'POST', 'route' => ['admin.registro-pacientes.store'], 'class' => 'form_validate']) !!}
        @include('admin.registro-pacientes.form')
    {!! Form::close() !!}
    </div>
</div>
@stop