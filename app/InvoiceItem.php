<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invoice;

class InvoiceItem extends Model {

    protected $fillable = [
        'concept',
        'qty',
        'unit_price',
        'sub_total',
        'order',
        'invoice_id',
        'owner',
        'user_id',
        'client_id',
    ];
    public $incrementing = false;

    public function invoice() {
        return $this->belongsTo(Invoice::class);
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
