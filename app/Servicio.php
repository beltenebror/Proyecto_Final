<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $table='servicios';
    protected $guarded = ['id'];

    public function municipioInicio()
    {
        return $this->hasOne('App\Municipios', 'id', 'municipios_id_inicio');
    }
}
