<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculo = Vehiculo::all();
        return response()->json($vehiculo);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|int',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'año' => 'nullable|integer',
            'placa' => 'required|string|max:20|unique:vehiculos',
            'chasis' => 'nullable|string|max:50|unique:vehiculos',
        ]);

        $vehiculo = Vehiculo::create([
            'id_cliente' => $request->id_cliente,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'año' => $request->año,
            'placa' => $request->placa,
            'chasis' => $request->chasis,
        ]);
 
        return response()->json($vehiculo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehiculo = Vehiculo::with('cliente')->find($id);

        if (!$vehiculo) {
            return response()->json(['mensaje' => 'Vehículo no encontrado'], 404);
        }

        $vehiculoPersonalizado = [
            'id' => $vehiculo->id,
            'id_cliente' => $vehiculo->id_cliente,
            'marca' => $vehiculo->marca,
            'modelo' => $vehiculo->modelo,
            'año' => $vehiculo->año,
            'placa' => $vehiculo->placa,
            'chasis' => $vehiculo->chasis,
            'nombre_cliente' => $vehiculo->cliente->nombre ?? 'Sin asignar',
            'fecha_registro' => $vehiculo->fecha_registro,
        ];

        return response()->json($vehiculoPersonalizado);
    
    }

 
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_cliente' => 'sometimes|exists:usuarios,id',
            'marca' => 'sometimes|string|max:50',
            'modelo' => 'sometimes|string|max:50',
            'año' => 'sometimes|integer',
            'placa' => 'sometimes|string|max:20|unique:vehiculos,placa,' . $id,
            'chasis' => 'nullable|string|max:50|unique:vehiculos,chasis,' . $id,
        ]);

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($request->all());
        return response()->json($vehiculo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $vehiculo = Vehiculo::findOrFail($id);
       $vehiculo->delete();
       return response()->json(null, 204);
    }
}
