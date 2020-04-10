@extends('layouts.app')
@section('title') Nuevo Médico @stop
@section('content')
<div class="card" id="facturaForm">
    <div class="card-header">
        <strong class="card-title">Nuevo Médico</strong>
    </div>
    <div class="card-body">
    {!! Form::open(['method' => 'POST', 'route' => ['admin.medicos.store'], 'class' => 'form_validate']) !!}
        @include('admin.medicos.form')
    {!! Form::close() !!}
    </div>
</div>
@stop