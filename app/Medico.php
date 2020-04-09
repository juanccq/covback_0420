<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Medico extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];
    public $incrementing = false;

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'especialidad',
    ];
    
    public static function rules($update = false, $id = null) {
        $commun = [
            'social_reason' => ' required|min:2',
            'email' => "required|email|unique:clients,email",
            //'email' => "required|email|unique:users,email",
        ];
        if ($update) {
            $commun['email'] = $commun['email'] . ",$id";
        }
        return $commun;
    }

    public function usuario() {
        return $this->hasOne(User::class);
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
