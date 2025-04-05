<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combo_servicio extends Model
{
    protected $table = 'combos_servicio';

    protected $fillable = [
        'id',
        'nombre',
        'modelo_vehiculo',
        'precio_total',
        'descripcion',
        'fecha_creacion'
    ];

    protected $casts = [
        'precio_total' => 'decimal:2',
        'fecha_registro' => 'datetime'
    ];
    public $timestamps = false;

    const CREATED_AT = 'fecha_registro';
}
