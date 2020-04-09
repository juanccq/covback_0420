@extends('layouts.auth')

@section('content')
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label>Correo electrónico</label>
            <input type="email"
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   id="email"
                   name="email"
                   required="required"
                   placeholder="Correo electrónico"
                   value="{{ old('email') }}" />
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="mb-4"> 
            <small id="emailHelp" class="form-text text-muted"><span class="badge badge-danger">NOTA</span> Se le enviará un enlace temporal a su correo electrónico para que pueda recuperar su contraseña. </small>
        </div>
        <div class="mt-4 mb-4">
            Recordo la contraseña ?
            <label class="pull-right">
                <a href="{{ route('login') }}">Ingresar</a>
            </label>
        </div>
        <button type="submit"  class="btn btn-brand btn-flat m-b-30 m-t-30">Enviar  <i class="fa fa-send"></i></button>
        <div class="mb-2 mt-2 footer-brand">
            &copy; 2020 | <a href="https://www.alisadomain.com" target="_self">SISTEMA DE FACTURACIÓN</a> Todos los derechos reservados 
        </div>
        <div class="alisa-footer-copy-login  ">
            Powered by  <a href="http://www.alisadomain.com" title="ALISA - Desarrollo de Sistemas de Información, Sitios Web y Aplicaciones móviles" target="_blank"> <img src="{{ asset('img/icon-alisa-footer.png') }}" alt="Alisa"> ALISA</a> 
        </div>
    </form>
</div>
@endsection
