@inject('request', 'Illuminate\Http\Request')
<!-- Left Panel -->
<aside id="left-panel" class="left-panel"> 
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/logo-m.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/logo-m-2.png') }}" alt="Logo"></a>
        </div>
        <div class="clearfix"></div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ $request->segment(2) == '' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-home"></i>@lang('global.app_dashboard')</a>
                </li>
                {{-- dd($request -> segment(2)) --}}
                @if(Gate::check('super_manage'))
                    <h3 class="menu-title">Registro Paciente</h3><!-- /.menu-title -->
                    <li class="{{ $request->segment(2) == 'registro-pacientes' && $request->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.pacientes.create') }}">
                            <i class="menu-icon fa fa-file"></i>
                            Nuevo Registro de Paciente
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'registro-pacientes' && $request->segment(3) == '' ? 'active' : '' }}">
                        <a href="{{ route('admin.registro-pacientes.index') }}">
                            <i class="menu-icon fa fa-file"></i>
                            Listar Paciente
                        </a>
                    </li>
                    
                    <h3 class="menu-title">Médicos</h3><!-- /.menu-title -->
                    <li class="{{ $request->segment(2) == 'medicos' && $request->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.medicos.create') }}">
                            <i class="menu-icon fa fa-file"></i>
                            Nuevo Médico
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'medicos' && $request->segment(3) == '' ? 'active' : '' }}">
                        <a href="{{ route('admin.medicos.index') }}">
                            <i class="menu-icon fa fa-list"></i>
                            Listar Médicos
                        </a>
                    </li>
                @endif
                @can('admin_manage')
                    <h3 class="menu-title">Configuración</h3><!-- /.menu-title -->
                      <li class="{{ $request->segment(2) == 'settings' && $request->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.create') }}">
                            <i class="menu-icon fa fa-file"></i>
                            Nueva Configuración
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'settings' && $request->segment(3) == '' ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}">
                            <i class="menu-icon fa fa-cog"></i>
                            @lang('global.settings.title')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.test-control') }}"> <i class="menu-icon fa fa-cog"></i>Check Cod. de control </a>
                    </li>
                @endcan
                <!--                <li>
                                    <a href="#"> <i class="menu-icon fa fa-cog"></i>Check Cod. control Masivo</a>
                                </li>-->
                @can('super_manage')
                <li class="{{ $request->segment(2) == 'users' ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="menu-icon fa fa-user"></i>
                        @lang('global.users.title')
                    </a>
                </li>
                @endcan
                @can('super_manage')
                <li class="{{ $request->segment(2) == 'permissions' ? 'active' : '' }}">
                    <a href="{{ route('admin.permissions.index') }}">
                        <i class="menu-icon fa fa-briefcase"></i>
                        @lang('global.permissions.title')
                    </a>
                </li>
                <li class="{{ $request->segment(2) == 'roles' ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}">
                        <i class="menu-icon fa fa-briefcase"></i>
                        @lang('global.roles.title')
                    </a>
                </li>
                @endcan
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
<!-- Left Panel -->