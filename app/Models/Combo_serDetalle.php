<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combo_serDetalle extends Model
{
    protected $table = 'combo_servicio_detalle';
    
    protected $fillable = [
        'id',
        'id_combo',
        'id_servicio',
    ];

    public $timestamps = false;
}
