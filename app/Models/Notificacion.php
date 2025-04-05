<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificaciones';

    protected $fillable = [
        'id',
        'id_usuario',
        'mensaje',
        'estado', 
        'fecha',
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];

    public $timestamps = false;

    const CREATED_AT = 'fecha';
}
