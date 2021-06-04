<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

    protected $fillable = [
        'clientes_id','anonimo'
    ];

    public $timestamps = false;

    protected $primaryKey = 'clientes_id';

    public function user()
    {
        return $this->hasOne('App\user', 'id', 'clientes_id');
    }
    
}
