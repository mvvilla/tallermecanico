<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vehiculo extends Model
{
   

    protected $table = 'vehiculos';

    protected $fillable = [
        'id',
        'id_cliente',
        'marca',
        'modelo',
        'año',
        'placa',
        'chasis',
        'fecha_registro'
    ];

     protected $casts = [
        'fecha_registro' => 'datetime',
    ];

  
    public $timestamps = false;

   
    const CREATED_AT = 'fecha_registro';
    
    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'id_cliente');
    }
}
