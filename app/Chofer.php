<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table='chofers';

    protected $fillable = [
        'user_id','zona',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\user', 'id', 'users_id');
    }
}
