<!-- Header-->
<header id="header" class="header">
    <div class="header-menu">
        
            <div class="col-sm-6">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <div class="dropdown for-message">
                        @if(Gate::check('admin_manage') || Gate::check('asistente_manage'))
                            <a href="{{ route('admin.invoices.create') }}" class="btn btn-secondary" >
                                <i class="fa fa-plus-square "></i>
                                Nueva Factura
                            </a>
                        @else
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-secondary" >
                                <i class="fa fa-plus-square "></i>
                                Nuevo Cliente
                            </a>
                            @impersonating
                                <a href="{{ route('admin.impersonate.leave') }}" class="btn btn-danger"> <i class="fa fa-refresh"></i> NO SUPLANTAR</a> 
                            @endImpersonating
                        @endif
                    </div>
                </div>
            </div>
        <div class="col-sm-6 mt-2">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    <i class="fa fa-angle-down"></i>
                </a>
                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{ route('change_password') }}">
                        <i class="fa fa-unlock-alt mr-2 "></i>
                        Cambiar contraseña
                    </a>
                    <a class="nav-link" href="#logout" onclick="jQuery('#logout').submit();">
                        <i class="fa fa-power-off mr-2 danger"></i>
                        @lang('global.app_logout')
                    </a>
                </div>
            </div>
        </div>
    </div>
</header><!-- /header -->
<!-- Header-->
<!--<div class="breadcrumbs">
    <div class="col-sm-6">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>
                    @yield('top_title')
                </h1>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>@yield('top_button')</li>

                </ol>
            </div>
        </div>
    </div>
</div>-->

@if(Session::has('success'))
<div class="col-sm-12">
    <div class="alert alert-success alert-dismissible fade show animated shake" role="alert">
        <span class="badge badge-pill badge-success"> <i class="fa fa-info-circle"></i> Guardado</span> {!! Session::get('success') !!} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if (Session::has('danger'))
<div class="col-sm-12">
    <div class="alert alert-danger alert-dismissible fade show animated shake" role="alert">
        <span class="badge badge-pill badge-danger"> <i class="fa fa-info-circle"></i> Eliminado</span> {{ Session::get('danger') }} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if (Session::has('email'))
<div class="col-sm-12">
    <div class="alert alert-danger alert-dismissible fade show animated shake" role="alert">
        <span class="badge badge-pill badge-danger"> <i class="fa fa-info-circle"></i> Error</span> {{ Session::get('email') }} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if(Session::has('errors'))
<div class="col-sm-12">
    <div class="alert alert-danger alert-dismissible fade show animated tada" role="alert">
        <span class="badge badge-pill badge-danger"> <i class="fa fa-exclamation-triangle"></i> Error</span> 
        Se produjo un error. Por favor vuelva a intentarlo.
        {{ session()->get('errors')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

{!! Form::open(['route' => 'logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}