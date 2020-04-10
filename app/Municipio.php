<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Municipio extends Model {

    public $incrementing = false;

    protected $fillable = [
        'numero_departamento',
        'departamento',
        'provincia',
        'numero_municipio',
        'municipio',
        'circunscripccion',
        'localidad'
    ];
    
    public static function rules($update = false, $id = null) {
        $commun = [
            'numero_departamento'   => 'required|integer',
            'departamento'          => "required|string|max:255",
            'provincia'             => "required|string|max:255",
            'numero_municipio'      => "required|integer",
            'municipio'             => "required|string|max:255",
            'circunscripccion'      => "string|max:255",
            'localidad'             => "string|max:255",
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

}
