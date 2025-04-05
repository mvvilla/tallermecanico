<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'instituciones';

    protected $fillable = [
        'id',
        'nombre',
        'contacto',
        'telefono',
        'correo',
        'direccion'
    ];
    public $timestamps = false;
}


