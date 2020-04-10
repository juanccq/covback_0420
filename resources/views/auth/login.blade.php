@extends('layouts.auth')

@section('content')
<form 
    method="POST" 
    action="{{ route('login') }}" 
    class="form_validate">
    @csrf

    <div class="form-group">
        <label for="email" >Correo electrónico</label>
        <input id="email" type="email" 
               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
               name="email"
               placeholder="usuario@dominio.com"
               value="{{ old('email') }}" 
               required autofocus>

        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password" >Contraseña</label>
        <input id="password"
               type="password" 
               class="form-control input_password {{ $errors->has('password') ? ' is-invalid' : '' }}" 
               placeholder="Contraseña"
               name="password" 
               required>

        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
    <div class="checkbox">
        <label class="pull-right">
            <a href="{{ route('password.request') }}">Olvido su contraseña?</a>            
        </label>
    </div>
    <button type="submit" class="btn btn-brand btn-flat m-b-30 m-t-30">Ingresar</button>
    <div class="mb-2 mt-2 footer-brand">
        &copy; 2020 | <a href="#" target="_self">Sistema</a> Todos los derechos reservados 
    </div>

    <div class="alisa-footer-copy-login  ">
        
    </div>
</form>

@endsection
