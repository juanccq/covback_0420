<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Hash;
use Illuminate\Support\Facades\Mail;
use Lab404\Impersonate\Models\Impersonate;
use App\Medico;

class User extends Authenticatable {

    use Notifiable;
    use HasRoles;
    use Impersonate;
    
    const MEDICO_ROL = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','medico_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

      /**
     * @return bool
     */
    public function canImpersonate()
    {
        // For example
        return $this->id == 1;
    }
    
    public function medico() {
        return $this->belongsToMany(Medico::class, 'medico_id');
    }
    
    /**
     * Hash password
     * @param $input
     * 
     */
    public function setPasswordAttribute($input) {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    
    
    public static function hashPassword( $input ) {
        return app( 'hash' ) ->needsRehash($input) ? Hash::make($input) : $input;
    }

    public function role() {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    /**
     * Send a password reset email to the user
     */
    public function sendPasswordResetNotification($token) {
        $setting = Setting::all()->first();
        $from = $setting->company_email_pdf;
        $correoDest = $this->email;
        $contactEmail = $setting->company_email_pdf;
        Mail::send('auth.passwords.email_html', compact('token', 'contactEmail'), function($message) use( $correoDest, $from ) {
            $message->to($correoDest, '')
                    ->subject('SISTEMA - Restablecer contraseña');
            $message->from($from, 'SISTEMA ');
        });
    }

}
