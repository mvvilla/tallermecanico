<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InventarioPieza extends Model
{
    protected $table = 'inventario_piezas';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'cantidad',
        'precio_unitario',
        'fecha_actualizacion'
    ];
    
    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'fecha_actualizacion' => 'datetime'
    ];
    public $timestamps = false;
    const UPDATED_AT = 'fecha_actualizacion';
}
