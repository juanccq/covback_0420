<?php $is_read = isset($is_read) ? $is_read : false; ?>
<div class="form-group">
    {!! Form::label('nombre',Lang::get('global.pacientes.fields.nombre').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Introduzca el Nombre', 'required' => 'true', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('nombre'))
    <p class="help-block">
       {{ $errors->first('nombre') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('paterno',Lang::get('global.pacientes.fields.paterno').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('paterno', old('paterno'), ['class' => 'form-control', 'placeholder' => 'Introduzca el Apellido Paterno', 'required' => 'true', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('paterno'))
    <p class="help-block">
        {{ $errors->first('paterno') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('materno',Lang::get('global.pacientes.fields.materno').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('materno', old('materno'), ['class' => 'form-control', 'placeholder' => 'Introduzca el Apellido Materno', 'required' => 'true', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('materno'))
    <p class="help-block">
        {{ $errors->first('materno') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('edad',Lang::get('global.pacientes.fields.edad').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::number('edad', old('edad'), ['class' => 'form-control', 'placeholder' => 'Introduzca Edad', 'required' => 'true', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('edad'))
    <p class="help-block">
        {{ $errors->first('edad') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('sexo',Lang::get('global.pacientes.fields.sexo').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-user"></i></div>
        </div>
        {!! Form::select('sexo', ['1' => 'Masculino', '2' => 'Femenino'], old('zona'), ['class' => 'form-control', 'placeholder' => 'Seleccione Sexo', 'required' => 'true', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('edad'))
    <p class="help-block">
        {{ $errors->first('edad') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('telefono',Lang::get('global.pacientes.fields.telefono').' ', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-phone"></i></div>
        </div>
        {!! Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => 'Introduzca Teléfono', 'required' => false, $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('telefono'))
    <p class="help-block">
        {{ $errors->first('telefono') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('celular',Lang::get('global.pacientes.fields.celular').' ', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-phone"></i></div>
        </div>
        {!! Form::text('celular', old('celular'), ['class' => 'form-control', 'placeholder' => 'Introduzca Celular', 'required' => false, $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('celular'))
    <p class="help-block">
        {{ $errors->first('celular') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('direccion',Lang::get('global.pacientes.fields.direccion').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('direccion', old('direccion'), ['class' => 'form-control', 'placeholder' => 'Introduzca Dirección', 'required' => 'true', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('direccion'))
    <p class="help-block">
        {{ $errors->first('direccion') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('zona',Lang::get('global.pacientes.fields.zona').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('zona', old('zona'), ['class' => 'form-control', 'placeholder' => 'Introduzca Zona', 'required' => 'true', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('zona'))
    <p class="help-block">
        {{ $errors->first('zona') }}
    </p>
    @endif
</div>

<div class="clearfix"></div>

<div class="row">
    @if(!$is_read)
    <div  class="col-md-8">
        <button id="formFacturaSubmit" class="btn btn-block btn-warning" type="submit"> <i class="fa fa-save"></i> Guardar y Registrar Ficha</button>
    </div>
    @endif
    <div class="col-md-<?php echo $is_read ? 12 : 4; ?>">
        <a href="{{ route('admin.medicos.index') }}" class="btn btn-block btn-secondary"> <i class="fa fa-ban"></i> Cancelar</a> 
    </div>
</div>