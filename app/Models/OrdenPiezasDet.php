<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class OrdenPiezasDet extends Model
{
    protected $table = 'orden_piezas_detalle';

    protected $fillable = [
        'id',
        'id_orden',
        'id_pieza',
        'cantidad',
    ];

    public $timestamps = false;

}
