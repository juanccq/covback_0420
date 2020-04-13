<?php $is_read = isset($is_read) ? $is_read : false; ?>
<div class="form-group">
    {!! Form::label('fecha_registro',Lang::get('global.medicos.fields.fecha_registro').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('fecha_registro', old('fecha_registro'), ['class' => 'form-control', 'placeholder' => 'Introduzca la fecha de registro', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('fecha_registro'))
    <p class="help-block">
       {{ $errors->first('fecha_registro') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('medico_id',Lang::get('global.medicos.fields.medico_id').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::select('medico_id', $medicos, null, ['class' => 'form-control', 'placeholder' => 'Introduzca el apellido paterno', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('medico_id'))
    <p class="help-block">
        {{ $errors->first('medico_id') }}
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