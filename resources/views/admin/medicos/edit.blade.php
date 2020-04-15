@extends('layouts.app')
@section('title') Editar Médico @stop
@section('top_title') @lang('global.medicos.title') @stop
@section('content')
<div class="card" id="facturaForm">
    <div class="card-header">
        <strong class="card-title">Editar Médico</strong>
    </div>
    <div class="card-body">
        {!! Form::model($medico, ['method' => 'PUT', 'route' => ['admin.medicos.update', $medico->id], 'class' => 'form_validate']) !!}
            @include('admin.medicos.form')
        {!! Form::close() !!}
    </div>
</div> <!-- .card --> 
@stop