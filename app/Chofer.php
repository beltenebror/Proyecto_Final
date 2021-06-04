<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table='chofers';

    protected $fillable = [
        'chofers_id','zona','precio_kilometro','precio_hora'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\user', 'id', 'chofers_id');
    }
}
