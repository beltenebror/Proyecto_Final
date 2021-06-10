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
        'name', 'image', 'email', 'password', 'dni', 'rol','municipios_id', 'telefono'
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
        return $this->hasOne('App\Cliente', 'clientes_id' , 'id');
    }

    public function chofer()
    {
        return $this->hasOne('App\Chofer',  'chofers_id' , 'id');
    }
    

    
  
    
}
