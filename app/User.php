<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dni', 'rol', 'comunidad', 'provincia', 'localidad', 'telefono'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'users_id');
    }

    public function chofer()
    {
        return $this->belongsTo('App\Chofer', 'users_id');
    }

    
  
    
}
