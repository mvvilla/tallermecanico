<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculoInst extends Model
{
    protected $table = 'vehiculos_institucionales';


    protected $fillable = [
        'id',
        'id_institucion',
        'id_vehiculo',
    ];
     
    public $timestamps = false;

}
