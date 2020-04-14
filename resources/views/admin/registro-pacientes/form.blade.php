<?php $is_read = isset($is_read) ? $is_read : false; ?>
<div class="form-group">
    {!! Form::label('fecha_registro',Lang::get('global.registro-pacientes.fields.fecha_registro').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
        </div>
        {!! Form::text('fecha_registro', old('fecha_registro'), ['class' => 'form-control date-picker', 'placeholder' => 'Introduzca la fecha de registro', 'required' => 'required', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('fecha_registro'))
    <p class="help-block">
       {{ $errors->first('fecha_registro') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('medico_id',Lang::get('global.registro-pacientes.fields.paciente_id').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('paciente', $paciente -> fullname, ['class' => 'form-control', 'required' => false, 'readonly']) !!}
        {!! Form::hidden('paciente_id', $paciente -> id) !!}
    </div>
    @if($errors->has('paciente_id'))
    <p class="help-block">
        {{ $errors->first('paciente_id') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('municipio_id',Lang::get('global.registro-pacientes.fields.municipio_id').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::select('municipio_id', $municipios, old('municipios_id'), ['class' => 'form-control', 'placeholder' => 'Seleccione el municipio', 'required' => true, $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('municipio_id'))
    <p class="help-block">
        {{ $errors->first('municipio_id') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('enfermedades_antecedentes',Lang::get('global.registro-pacientes.fields.enfermedades_antecedentes').' ', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-user"></i></div>
        </div>
        {!! Form::textarea('enfermedades_antecedentes', old('enfermedades_antecedentes'), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Enfermedades de base y antecendentes', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('enfermedades_antecedentes'))
    <p class="help-block">
        {{ $errors->first('enfermedades_antecedentes') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('medicacion_actual',Lang::get('global.registro-pacientes.fields.medicacion_actual').' ', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-user"></i></div>
        </div>
        {!! Form::textarea('medicacion_actual', old('medicacion_actual'), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Medicación Actual', 'required' => '', $is_read?'readonly':'']) !!}
    </div>
    @if($errors->has('medicacion_actual'))
    <p class="help-block">
        {{ $errors->first('medicacion_actual') }}
    </p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('seguro_salud',Lang::get('global.registro-pacientes.fields.seguro_salud').' (*)', ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-tag"></i></div>
        </div>
        {!! Form::text('seguro_salud', old('seguro_salud'), ['class' => 'form-control', 'placeholder' => 'Introduzca Zona', 'required' => 'true', $is_read?'readonly':'']) !!}
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
        <button id="formFacturaSubmit" class="btn btn-block btn-warning" type="submit"> <i class="fa fa-save"></i> Guardar</button>
    </div>
    @endif
    <div class="col-md-<?php echo $is_read ? 12 : 4; ?>">
        <a href="{{ route('admin.medicos.index') }}" class="btn btn-block btn-secondary"> <i class="fa fa-ban"></i> Cancelar</a> 
    </div>
</div>