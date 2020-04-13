<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class PacienteController extends AdminController {
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $req_tmp = $this->preStore($request->all());
        
        $v = \Validator::make($req_tmp, Paciente::rules());
        
        if ($v->fails()) {
            return redirect()->back()->withInput();
        }
        
        $client= Paciente::create($req_tmp);
        
        //Session::flash('success', 'Cliente creado satisfactoriamente!');
        Session::flash('success', 'Paciente registrado satisfactoriamente!<br />');
        
        return redirect()->route('admin.registro-pacientes-add', [ 'pacienteId' => $client -> id ]);
    }
}