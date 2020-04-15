@extends('layouts.app')
@section('title') Médico @stop
@section('content')
<?php $is_read=true; ?>
<div class="card">
    <div class="card-header">
        <strong class="card-title">Ver Médico</strong>
    </div>
    <div class="card-body">
        {!! Form::model($medico, ['method' => 'PUT', 'route' => ['admin.medicos.update',$medico->id], 'class' => 'form_validate form-horizontal']) !!}
        @include('admin.medicos.form')
        {!! Form::close() !!}
    </div>
</div> <!-- .card --> 
@stop