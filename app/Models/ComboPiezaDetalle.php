<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComboPiezaDetalle extends Model
{
    protected $table = 'combo_piezas_detalle';

    protected $fillable = [
        'id',
        'id_combo',
        'id_pieza',
        'cantidad'
    ];

    public $timestamps = false;
}
