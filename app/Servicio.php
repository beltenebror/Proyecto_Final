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

    public function cliente()
    {
        return $this->hasOne('App\Cliente', 'clientes_id' , 'clientes_clientes_id');
    }

    public function chofer()
    {
        return $this->hasOne('App\Chofer',  'chofers_id' , 'chofers_chofers_id');
    }

}
