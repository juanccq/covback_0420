<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class ClientController extends AdminController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        parent::setUser();
        // DONE - gaston - el no usar table puede hacer que se hagan varios queries al quere obtener relacion
        $db = DB::table('clients')
                ->select('clients.*', 'users.id as user_id')
                ->leftJoin('users', 'clients.id', '=', 'users.client_id')
                ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                ->whereIn('model_has_roles.role_id', array(2, 3))
                ->whereNull('deleted_at');

        //$db = Client::whereNull('deleted_at');
        if (Gate::allows('reseller_manage')) {
            $db->where('type','=','1');
            $db->where('owner','=',$this->user->id);
        }
         $db->orderBy('social_reason', 'asc');
        $entities =$db->get();
        //dd($entities);
        //dd($entities[2]->user_id);
        return view('admin.clients.index', compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $req_tmp = $this->preStore($request->all());
        if (Gate::allows('super_manage')) {
            $req_tmp['type'] = 2; // reseller by Default
        }
        $v = \Validator::make($req_tmp, Client::rules());
        if ($v->fails()) {
            Session::flash('email', 'Email ya esta en uso!');
            return redirect()->back()->withInput();
        }
        $client=Client::create($req_tmp);
        //--dd($client->id);
        $password_plain = rand(1000, 9999);
        $nuser = User::create([
                    'name' => $client->social_reason,
                    'email' => $client->email,
                    'password' => $password_plain,
                    'client_id' => $client->id,
        ]);

        $tipo = ($client->type == 2) ? 'reseller' : 'admin';
        $nuser->assignRole($tipo);

        //Session::flash('success', 'Cliente creado satisfactoriamente!');
        Session::flash('success', 'Cliente creado satisfactoriamente!<br />
            <span class="badge badge-pill badge-warning">Usuario</span> '.$client->email.' <br />
            <span class="badge badge-pill badge-warning">Nueva Contraseña</span> <span id="newPassword">'.$password_plain.'</span>');
        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client) {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client) {
        $item = $client;
        $req_tmp = $this->preUpdate($request->all());
        $v2=Client::rules(1,$client->id);
//        $v2=Client::rules(1,$client->email);
//        $v2=Client::rules(1,'61');
//        dd($v2);
        $v = \Validator::make($req_tmp, $v2);
        if ($v->fails()) {
            Session::flash('email', 'Email ya esta en uso!');
            return redirect()->back()->withInput();
        }
        $item->update($req_tmp);

        Session::flash('success', 'Cliente modificada satisfactoriamente!');
        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client) {
        $usuarios = User::where('client_id', $client->id)->count();
        Client::destroy($client->id);
        if ($usuarios > 0) {
            DB::table('users')->where('client_id', $client->id)->delete();
            Session::flash('danger', 'Usuarios y Cliente eliminados correctamente!');
        } else {
            Session::flash('danger', 'El cliente ha sido eliminado correctamente!!!');
        }
        return redirect()->route('admin.clients.index');
    }
   
}
