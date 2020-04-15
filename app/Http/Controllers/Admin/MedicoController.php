<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class MedicoController extends AdminController {
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        parent::setUser();
        // DONE - gaston - el no usar table puede hacer que se hagan varios queries al quere obtener relacion
        $db = DB::table('medicos')
                    ->select('medicos.*');

        $db->orderBy('paterno', 'asc');
        $entities =$db->get();
        
        return view('admin.medicos.index', compact('entities'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $req_tmp = $this->preStore($request->all());
        
        $v = \Validator::make($req_tmp, Medico::rules());
        if ($v->fails()) {
            return redirect()->back()->withInput();
        }
        
        $medico = Medico::create($req_tmp);
        $password_plain = rand(1000, 9999);
        
        $nuser = User::create([
            'name' => $medico->nombre . ' ' . $medico -> paterno .' ' . $medico -> materno,
            'email' => $medico->ci,
            'password' => $password_plain,
            'medico_id' => $medico->id,
        ]);

        $nuser->assignRole( User::MEDICO_ROL );
        
        Session::flash('success', 'Médico creado satisfactoriamente!<br />
            <span class="badge badge-pill badge-warning">Usuario</span> '.$medico->ci.' <br />
            <span class="badge badge-pill badge-warning">Nueva Contraseña</span> <span id="newPassword">'.$password_plain.'</span>');
        
        return redirect()->route('admin.medicos.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico) {
        return view('admin.medicos.show', compact('medico'));
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico) {
        return view('admin.medicos.edit', compact('medico'));
    }
    
    
    public function resetPassword( Medico $medico ) {
        $password_plain = rand(1000, 9999);
        
        DB::table('users')
                ->where('medico_id', $medico->id)
                ->where('email', $medico->ci)
                ->update(['password' => User::hashPassword($password_plain)]);
        
        Session::flash('success', 'Médico creado satisfactoriamente!<br />
            <span class="badge badge-pill badge-warning">Usuario</span> '.$medico->ci.' <br />
            <span class="badge badge-pill badge-warning">Nueva Contraseña</span> <span id="newPassword">'.$password_plain.'</span>');
        
        return redirect()->route('admin.medicos.show', [ 'medico' => $medico -> id ]);
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico) {
        $item2 = clone $medico;
        $item = $medico;
        $req_tmp = $this->preUpdate($request->all());
        $v2=Medico::rules(1,$medico->id);

        $v = \Validator::make($req_tmp, $v2);
        if ($v->fails()) {
            return redirect()->back()->withInput();
        }
        
        $item->fill($req_tmp);
        if ($item->isDirty('ci')) {// Change main account user email
            DB::table('users')
                ->where('medico_id', $medico->id)
                ->where('email', $item2->ci)->update(['ci' => $item->ci]);
        }
        $item->save();

        Session::flash('success', 'Medico modificado satisfactoriamente!');
        return redirect()->route('admin.medicos.index');
    }
}