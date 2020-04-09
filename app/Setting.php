<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    public function invoices() {
        return $this->hasMany(App\Invoice::class);
    }

    protected $fillable = [
        'type',
        'auth_number',
        'gen_key',
        'start_rank',
        'end_rank',
        'date_limit',
        'correlative',
        'active',
        'company_name',
        'company_slogan',
        'company_slogan2',
        'company_address',
        'company_nit',
        'company_social_reason',
        'company_activity',
        'company_legend',
        'company_email_pdf',
        'owner',
        'user_id',
        'client_id',
    ];
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
