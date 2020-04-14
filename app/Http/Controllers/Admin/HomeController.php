<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\FichaPaciente;

class HomeController extends AdminController {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        parent::setUser();
        if (1) {// Muestra permisos del usuario actual
            // get logged-in user
            $user = auth()->user();

            // get all inherited permissions for that user
            //$permissions1 = $user->permissions;
            $permissions = $user->getAllPermissions();
            $roles = $user->getRoleNames();
            //   dd($permissions1);
            //dd($roles);
            $permisos = [];
            foreach ($permissions as $permission) {

                $permisos[] = $permission->getOriginal()['name'];
            }
            //dd($permisos);
            \Debugbar::info($permisos);
        }
        if (Gate::allows('super_manage') ||
            Gate::allows('reseller_manage')
                ){
             $db = DB::table('medicos')
                ->select('medicos.*', 'users.id as user_id')
                ->leftJoin('users', 'medicos.id', '=', 'users.medico_id')
                ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                ->whereIn('model_has_roles.role_id', array(2, 3));
        
            $clients = $db->latest()
                ->take(5)
                ->get();
            return view('admin/home', compact('clients'));    
        }
        
        if (Gate::allows('medico_manage')) {
            $fichaPaciente = FichaPaciente::where( 'paciente_id', $user -> id ) -> get();
            
            return view('admin/home', compact('fichaPaciente'));
        }
        
        return view('admin/home');
    }

}
