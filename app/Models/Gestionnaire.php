<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class Gestionnaire extends Authenticatable
{
// gestionnaire
    use HasFactory, Notifiable;

    protected $guard = 'doctor';

    protected $fillable = [
        'name',
        'email',
        'username',
        'prenom',
        'region',
        'numero_de_telephone',
        'numero_de_hopital',
        'IsBan',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($gestionnaire) {
            $gestionnaire->stock()->create();
        });
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notifications::class); 
    }
}
