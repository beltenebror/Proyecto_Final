<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    public function provincia()
    {
        return $this->hasOne('App\Provincias', 'id','provincias_id');
    }
    public function comunidad()
    {
        return $this->hasOne('App\Comunidades', 'id','provincias_comunidades_id');
    }
}
