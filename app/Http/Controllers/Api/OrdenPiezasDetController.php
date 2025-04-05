<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdenPiezasDet;

class OrdenPiezasDetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenPiezasDet = OrdenPiezasDet::all();
        return response()->json($ordenPiezasDet);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'id_orden' => 'required|integer',
            'id_pieza' => 'required|integer',
            'cantidad' => 'required|integer',
        ]);

        $ordenPiezasDet = OrdenPiezasDet::create([
            'id_orden' => $request->id_orden,
            'id_pieza' => $request->id_pieza,
            'cantidad' => $request->cantidad,
        ]);
        return response()->json($ordenPiezasDet, 201);

    } catch (\Exception $e) {
        Log::error('Error al crear el detalle: ' . $e->getMessage());
        return response()->json([
            'error' => 'Error al crear el recurso',
            'message' => $e->getMessage(),
        ], 500);
    }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordenPiezasDet = OrdenPiezasDet::findOrFail($id);
        return response()->json($ordenPiezasDet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_orden' => 'required|integer',
            'id_pieza' => 'required|integer',
            'cantidad' => 'required|integer',
        ]);


        $ordenPiezasDet = OrdenPiezasDet::findOrFail($id);
        $ordenPiezasDet->update($request->all());
        return response()->json($ordenPiezasDet);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ordenPiezasDet = OrdenPiezasDet::findOrFail($id);
        $ordenPiezasDet->delete();
        return response()->json(null, 204);
    }
}
