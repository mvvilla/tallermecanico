<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventarioPieza;

class InventarioPiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $inventarioPieza = InventarioPieza::all();
       return response()->json($inventarioPieza);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|integer',
            'precio_unitario' => 'required|numeric|min:1'
        ]);

        $inventarioPieza = InventarioPieza::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
        ]);

        return response()->json($inventarioPieza, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventarioPieza = InventarioPieza::findOrFail($id);
        return response()->json($inventarioPieza);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|integer',
            'precio_unitario' => 'required|numeric|min:1'
        ]);

        $inventarioPieza = InventarioPieza::findOrFail($id);
        $inventarioPieza->update($request->all());
        return response()->json($inventarioPieza);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventarioPieza = InventarioPieza::findOrFail($id);
        $inventarioPieza->delete();
        return response()->json(null, 204);
    }
}
