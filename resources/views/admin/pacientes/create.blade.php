@extends('layouts.app')
@section('title') Nuevo Paciente @stop
@section('content')
<div class="card" id="facturaForm">
    <div class="card-header">
        <strong class="card-title">Nuevo Paciente</strong>
    </div>
    <div class="card-body">
    {!! Form::open(['method' => 'POST', 'route' => ['admin.pacientes.store'], 'class' => 'form_validate']) !!}
        @include('admin.pacientes.form')
    {!! Form::close() !!}
    </div>
</div>
@stop