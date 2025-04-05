<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Factura extends Model
{
    protected $table = 'facturas';

    protected $fillable = [
        'id',
        'id_orden',
        'id_cliente',
        'total',
        'iva',
        'estado',
        'fecha_emision'
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'iva' => 'decimal:2',
        'fecha_emision' => 'datetime',
    ];

    public $timestamps = false;

    const CREATED_AT = 'fecha_emision';

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'id_cliente');
    }
}
