<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenSerDetalle extends Model
{
    protected $table = 'orden_piezas_detalle';

    protected $fillable = [
        'id',
        'id_orden',
        'id_servicio',
    ];

    public $timestamps = false;
}
