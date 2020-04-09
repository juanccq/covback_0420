<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Gate;

class SettingController extends AdminController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main(Request $request) {
        if (!Gate::allows('admin_manage')) {
            return abort(403);
        }
        $setting = Setting::all()->first();
        if ($request->method() == 'POST') {
            $data = $request->all();
            $data['start_rank'] = intval($request->start_rank);
            $data['end_rank'] = intval($request->end_rank);
            $data['correlative'] = intval($request->correlative);
            $date = explode('/', $request->date_limit);
            $data['date_limit'] = $date[2] . '-' . $date[1] . '-' . $date[0];
            $data['_token'] = $request->_token;
            $setting->update($data);
            Session::flash('success', 'Datos de configuración actualizados!');
        }

        if ($setting->date_limit != '') {
            $date = explode('-', $setting->date_limit);
            $setting->date_limit = $date[2] . '/' . $date[1] . '/' . $date[0];
        }
        return view('admin.settings.edit', compact('setting'));
    }
    private function preData($data,$request){
        $data['start_rank'] = intval($request->start_rank);
            $data['end_rank'] = intval($request->end_rank);
            $data['correlative'] = intval($request->correlative);
            $date = explode('/', $request->date_limit);
            $data['date_limit'] = $date[2] . '-' . $date[1] . '-' . $date[0];
            return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        parent::setUser();
        $db = Setting::whereNull('deleted_at');
        if (Gate::allows('admin_manage')) {
            $db->where('owner', '=', $this->user->id);
        }
        $entities = $db->get();

        return view('admin.settings.index', compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        parent::setUser();
        $db = Setting::whereNull('deleted_at');
        $db->where('active', '=', '1');
        if (Gate::allows('admin_manage')) {
            $db->where('owner', '=', $this->user->id);
        }
        $setting = $db->first();
        if($setting){
            $clean = ['id', 'auth_number', 'gen_key', 'date_limit', 'owner', 'user_id', 'created_at', 'updated_at', 'deleted_at', 'client_id'];
            foreach ($clean as $key => $value) {
                $setting->{$value} = '';
            }
            $setting->correlative=$setting->start_rank;
        }
        //dd($setting);
        return view('admin.settings.create', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        parent::setUser();
        $db = Setting::whereNull('deleted_at');
        $db->where('active', '=', '1');
        if (Gate::allows('admin_manage')) {
            $db->where('owner', '=', $this->user->id);
        }
        $setting = $db->first();
        $setting->active = 0;
        $setting->update();
        $req_tmp = $this->preStore($request->all());
        if (Gate::allows('admin_manage')) {
            $req_tmp['active'] = 1; // reseller by Default
            $req_tmp['client_id']=$this->user->client_id;
        }
        $req_tmp = $this->preData($req_tmp, $request);
        //dd($req_tmp);
        Setting::create($req_tmp);

        Session::flash('success', 'Configuración creada satisfactoriamente!');
        return redirect()->route('admin.settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting) {
        return view('admin.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting) {
        if (!$setting->active) {
            return abort(403);
        }
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting) {
        if (!$setting->active) {
            return abort(403);
        }
        $item = $setting;
        $req_tmp = $this->preUpdate($request->all());
        $item->update($req_tmp);

        Session::flash('success', 'Configuración modificada satisfactoriamente!');
        return redirect()->route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting) {
        //
    }

}
