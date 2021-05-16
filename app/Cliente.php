<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clients';

    protected $fillable = [
        'user_id',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\user', 'id', 'users_id');
    }
    
}
