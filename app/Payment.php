<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];
    public $incrementing = false;

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
