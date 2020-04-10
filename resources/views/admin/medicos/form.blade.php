<?php $is_read = isset($is_read) ? $is_read : false; ?>
<div class="form-group">
    {!! Form::label('social_reason',Lang::get('global.medicos.fields.nombre').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('nombre'))
    <p class="help-block">
       {{ $errors->first('nombre') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('email',Lang::get('global.medicos.fields.paterno').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('paterno', old('paterno'), ['class' => 'form-control', 'placeholder' => 'Introduzca el apellido paterno', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('paterno'))
    <p class="help-block">
        {{ $errors->first('paterno') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('materno',Lang::get('global.medicos.fields.materno').' ', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-phone"></i></div>
        </div>
        {!! Form::text('materno', old('materno'), ['class' => 'form-control', 'placeholder' => 'Introduzca el apellido materno', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('materno'))
    <p class="help-block">
        {{ $errors->first('materno') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('especialidad',Lang::get('global.medicos.fields.especialidad').' ', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-user"></i></div>
        </div>
        {!! Form::text('especialidad', old('especialidad'), ['class' => 'form-control', 'placeholder' => 'Introduzca especialidad', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('especialidad'))
    <p class="help-block">
        {{ $errors->first('especialidad') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('telefono',Lang::get('global.medicos.fields.telefono').' ', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-phone"></i></div>
        </div>
        {!! Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => 'Introduzca el teléfono', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('telefono'))
    <p class="help-block">
        {{ $errors->first('telefono') }}
    </p>
    @endif
</div>

<div class="clearfix"></div>

<div class="row">
    @if(!$is_read)
    <div  class="col-md-8">
        <button id="formFacturaSubmit" class="btn btn-block btn-warning" type="submit"> <i class="fa fa-save"></i> Guardar</button>
    </div>
    @endif
    <div class="col-md-<?php echo $is_read ? 12 : 4; ?>">
        <a href="{{ route('admin.medicos.index') }}" class="btn btn-block btn-secondary"> <i class="fa fa-ban"></i> Cancelar</a> 
    </div>
</div>