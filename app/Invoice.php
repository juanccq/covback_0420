<?php

namespace App;

use App\InvoiceItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];
    protected $fillable = [
        'type',
        'social_reason',
        'total',
        'nit',
        'setting_id',
        'owner',
        'user_id',
        'client_id',
    ];

    public function items() {
        return $this->hasMany(InvoiceItem::class);
    }

    public function config() {
        return $this->belongsTo(App\Setting::class);
    }

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
