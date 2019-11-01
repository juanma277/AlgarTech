<?php

namespace AlgarTech;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'nombre', 'direccion', 'telefono', 'tipoCliente', 'pais', 'departamento', 'ciudad'
    ];
}
