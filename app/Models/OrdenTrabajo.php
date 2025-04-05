<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table = 'ordenes_trabajo';

    protected $fillable = [
        'id',
        'id_vehiculo',
        'id_cliente',
        'id_mecanico',
        'id_combo',
        'estado',
        'fecha_inicio',
        'fecha_fin'
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
    ];

    public $timestamps = false;

    const CREATED_AT = 'fecha_inicio';

}
