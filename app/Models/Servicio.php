<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    protected $table = 'servicios';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'precio',
        'tiempo_estimado',
    ];

    protected $casts = [
        'precio' => 'decimal:2', 
    ];
    public $timestamps = false;
}
