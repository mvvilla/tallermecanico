<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdenTrabajo;

class OrdenTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenTrabajo = OrdenTrabajo::all();
        return response()->json($ordenTrabajo);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_vehiculo' => 'required|integer',
            'id_cliente' => 'required|integer',
            'id_mecanico' => 'required|integer',
            'id_combo' => 'required|integer',
            'estado' => 'sometimes|in:pendiente,en progreso,completado,cancelado',
            'fecha_fin' => 'nullable|datetime',
        ]);

        $ordenTrabajo = OrdenTrabajo::create([
            'id_vehiculo' => $request->id_vehiculo,
            'id_cliente' => $request->id_cliente,
            'id_mecanico' => $request->id_mecanico,
            'id_combo' => $request->id_combo,
            'estado' => $request->estado,
            'fecha_fin' => $request->fecha_fin,
        ]);
        return response()->json($ordenTrabajo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordenTrabajo = OrdenTrabajo::findOrFail($id);
        return response()->json($ordenTrabajo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_vehiculo' => 'required|integer',
            'id_cliente' => 'required|integer',
            'id_mecanico' => 'required|integer',
            'id_combo' => 'required|integer',
            'estado' => 'sometimes|in:pendiente,en progreso,completado,cancelado',
            'fecha_fin' => 'nullable|date',
        ]);

        $ordenTrabajo = OrdenTrabajo::findOrFail($id);
        $ordenTrabajo->update($request->all());
        return response()->json($ordenTrabajo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ordenTrabajo = OrdenTrabajo::findOrFail($id);
        $ordenTrabajo->delete();
        return response()->json(null, 204);
    }
}
