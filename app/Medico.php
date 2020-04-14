<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Medico extends Model {

    public $incrementing = false;

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'especialidad',
        'telefono',
        'ci'
    ];
    
    public static function rules($update = false, $id = null) {
        $commun = [
            'nombre'        => 'required|string|max:255',
            'paterno'       => "required|string|max:255",
            'materno'       => "required|string|max:255",
            'especialidad'  => "required|string|max:255",
            'telefono'      => "required|string|max:50",
            'ci'            => "required|string|max:20",
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
        return $this -> nombre .' ' . $this -> paterno .' ' . $this -> materno;
    }
}
