<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class AdminController extends Controller {

    public static $dias = [
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado',
        7 => 'Domingo'
    ];
    public static $meses = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];
    var $user;

    public function setUser() {
        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->setUser();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.clients.create');
    }

    public function preSave($req_tmp, $new = 1) {
        $this->setUser();
        if ($new) {
            $req_tmp['owner'] = $this->user->id;
        }
        $req_tmp['user_id'] = $this->user->id;
        return $req_tmp;
    }

    public function preUpdate($req_tmp) {
        return $this->preSave($req_tmp, 0);
    }

    public function preStore($req_tmp) {
        return $this->preSave($req_tmp);
    }

   

}
