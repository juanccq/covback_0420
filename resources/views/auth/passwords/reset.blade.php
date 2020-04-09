@extends('layouts.auth')

@section('content')
<div class="card-body">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" 
                   placeholder="Correo electrónico"
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password" >{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
        <div class="mt-4 mb-4">
            Recordo la contraseña ?
            <label class="pull-right">
                <a href="{{ route('login') }}">Ingresar</a>
            </label>
        </div>
        <button type="submit"  class="btn btn-brand btn-flat m-b-30 m-t-30">{{ __('Reset Password') }}  <i class="fa fa-unlock"></i></button>
        <div class="mb-2 mt-2 footer-brand">
            &copy; 2020 | <a href="https://www.alisadomain.com" target="_self">SISTEMA DE FACTURACIÓN.</a> Todos los derechos reservados 
        </div>
        <div class="alisa-footer-copy-login  ">
            Powered by  <a href="http://www.alisadomain.com" title="ALISA - Desarrollo de Sistemas de Información, Sitios Web y Aplicaciones móviles" target="_blank"> <img src="{{ asset('img/icon-alisa-footer.png') }}" alt="Alisa"> ALISA</a> 
        </div>
    </form>
</div>
@endsection