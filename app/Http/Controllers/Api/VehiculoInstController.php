<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehiculoInst;

class VehiculoInstController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculoInst = VehiculoInst::all();
        return response()->json($vehiculoInst);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_institucion' => 'required|integrer',
            'id_vehiculo' => 'required|integrer',
        ]);

        $vehiculoInst = VehiculoInst::create([
            'id_institucion' => $request->id_institucion,
            'id_vehiculo' => $request->id_vehiculo
        ]);
 
        return response()->json($vehiculoInst, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehiculoInst = VehiculoInst::findOrFail($id);
        return response()->json($vehiculoInst);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_institucion' => 'required|integrer',
            'id_vehiculo' => 'required|integrer',
        ]);

        $vehiculoInst = VehiculoInst::findOrFail($id);
        $vehiculoInst->update($request->all());
        return response()->json($vehiculo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculoInst = VehiculoInst::findOrFail($id);
        $vehiculoInst->delete();
        return response()->json(null, 204);
    }
}
