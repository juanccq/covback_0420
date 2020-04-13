<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Paciente extends Model {

    public $incrementing = false;

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'telefono',
        'celular',
        'direccion',
        'zona',
        'zona_lat_lng',
        'edad',
        'sexo',
    ];
    
    public static function rules($update = false, $id = null) {
        $commun = [
            'nombre'        => 'required|string|max:255',
            'paterno'       => "required|string|max:255",
            'materno'       => "required|string|max:255",
            'telefono'      => "string|max:50",
            'celular'       => "string|max:50",
            'direccion'     => "required|string",
            'zona'          => "required|string",
            'zona_lat_lng'  => "string|max:255",
            'edad'          => "required|integer",
            'sexo'          => "required|integer"
        ];
        
        return $commun;
    }
    
    /**
     * Boot the Model.
     */
    public static function boot() {
        parent::boot();

        static::creating(function ($instance) {
            $instance->id = uuid4();
        });
    }

    
    public function getFullnameAttribute() {
        return $this -> nombre . ' ' . $this -> paterno . ' ' . $this -> materno;
    }
}
