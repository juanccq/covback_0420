@extends('layouts.app')

@section('content')

@if(session('success'))
    <!-- If password successfully show message -->
    <div class="row">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@else
    <div class="card">
        {!! Form::open(['method' => 'PATCH','class'=>'form_validate', 'route' => ['change_password']]) !!}
        <div class="card-header">
            <strong class="card-title">Cambio de contraseña</strong>
        </div>
        <div class="card-body">
            <div class="row form-group">
                <div class="col col-md-3 text-right align-middle"><label for="text-input" class=" form-control-label">Actual contraseña <span class="text-danger">(**)</span> </label></div>
                <div class="col-12 col-md-9">
                    {!! Form::password('current_password', ['class' => 'form-control input_password ', 'placeholder' => '','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('current_password'))
                    <p class="help-block">
                        {{ $errors->first('current_password') }}
                    </p>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3 text-right align-middle"><label for="text-input" class=" form-control-label">Nueva contraseña <span class="text-danger">(**)</span> </label></div>
                <div class="col-12 col-md-9">
                    {!! Form::password('new_password', ['class' => 'form-control input_password', 'placeholder' => '','required'=>'required']) !!}
                    <small class="form-text text-muted">La nueva contraseña debe contener mínimo 8 caracterres alfanuméricos. </small>
                    <p class="help-block"></p>
                    @if($errors->has('new_password'))
                    <p class="help-block">
                        {{ $errors->first('new_password') }}
                    </p>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3 text-right align-middle"><label for="text-input" class=" form-control-label">Repetir nueva contraseña <span class="text-danger">(**)</span> </label></div>
                <div class="col-12 col-md-9">
                    {!! Form::password('new_password_confirmation', ['class' => 'form-control input_password', 'placeholder' => '','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('new_password_confirmation'))
                    <p class="help-block">
                        {{ $errors->first('new_password_confirmation') }}
                    </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <small class="form-text text-muted"><span class="text-danger">(**)</span>   Estos campos no son editables. Si necesita realizar estos cambios, por favor pongase en contacto con el encargado del sistema.</small>
                </div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-brand mb-2"><i class="fa fa-save"></i> Guardar</button>
                </div>
                <div class="col-md-4">
                    <a href="#" class="btn btn-block btn-secondary"> <i class="fa fa-ban"></i> Cancelar</a> 
                </div>
            </div>
        </div>
        {!! Form::close() !!}                    
    </div> <!-- .card -->
@endif
@stop

