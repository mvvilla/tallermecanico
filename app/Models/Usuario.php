<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

   
    protected $table = 'usuarios';

    protected $fillable = [
        'id',
        'nombre',
        'telefono',
        'correo',
        'contraseña',
        'rol',
        'fecha_registro'
    ];
    protected $hidden = [
        'contraseña',
    ];

     protected $casts = [
        'fecha_registro' => 'datetime',
    ];

  
    public $timestamps = false;

   
    const CREATED_AT = 'fecha_registro';
}
