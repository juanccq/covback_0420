<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
     <style type="text/css">
            .error{
                display:block;
                color:red !important;
                width:100%;
            }
            
        </style>
</head>

<body class="bg-brand-login">
      <!-- Carrusel login -->
    <div class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item ">
            </div>
            <div class="carousel-item active">
            </div>
            <div class="carousel-item">
            </div> 
        </div>
    </div>
<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="{{ route('login') }}">
                        <img class="align-content" src="{{ asset('img/logo-m.png') }}" alt="{{ ucfirst(config('app.name')) }}">
                    </a>
                </div>
                <div class="login-form">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('partials.javascripts')

</body>
</html>