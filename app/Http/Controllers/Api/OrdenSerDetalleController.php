<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdenSerDetalle;

class OrdenSerDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenSerDetalle = OrdenSerDetalle::all();
        return response()->json($ordenSerDetalle);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_orden' => 'required|integer',
            'id_servicio' => 'required|integer',
        ]);

        $ordenSerDetalle = OrdenSerDetalle::create([
            'id_orden' => $request->id_orden,
            'id_servicio' => $request->id_servicio,
        ]);
        return response()->json($ordenSerDetalle, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordenSerDetalle = OrdenSerDetalle::findOrFail($id);
        return response()->json($ordenSerDetalle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_orden' => 'required|integer',
            'id_servicio' => 'required|integer',
        ]);

        $ordenSerDetalle = OrdenSerDetalle::findOrFail($id);
        $ordenSerDetalle->update($request->all());
        return response()->json($ordenSerDetalle);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ordenSerDetalle = OrdenSerDetalle::findOrFail($id);
        $ordenSerDetalle->delete();
        return response()->json(null, 204);
    }
}
