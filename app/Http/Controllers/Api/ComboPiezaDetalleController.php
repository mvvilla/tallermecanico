<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComboPiezaDetalle;

class ComboPiezaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    try {

        $comboPiezaDetalle = ComboPiezaDetalle::all();
        return response()->json($comboPiezaDetalle);

    } catch (\Exception $e) {
        return response()->json([
         'status' => 'error',
         'message' => 'Error al obtener los detalles del combo.',
         'error' => $e->getMessage(),
        ], 500);
     }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {

        $request->validate([
            'id_combo' => 'required|integer',
            'id_pieza' => 'required|integer',
            'cantidad' => 'required|integer',
        ]);
        
        $comboPiezaDetalle = ComboPiezaDetalle::create([
            'id_combo' => $request->id_combo,
            'id_pieza' => $request->id_pieza,
            'cantidad' => $request->cantidad,
        ]);
 
        return response()->json($comboPiezaDetalle, 201);
    
    } catch (ValidationException $e) {
        return response()->json([
         'status' => 'error',
         'message' => 'Error de validación.',
         'errors' => $e->errors(),
       ], 422);
     } catch (\Exception $e) {
        return response()->json([
         'status' => 'error',
         'message' => 'Error al crear el detalle del combo.',
         'error' => $e->getMessage(),
        ], 500);
     }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    try {

        $comboPiezaDetalle = ComboPiezaDetalle::findOrFail($id);
        return response()->json($comboPiezaDetalle);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
         'status' => 'error',
         'message' => 'Detalle del combo no encontrado.',
        ], 404);
     } catch (\Exception $e) {
        return response()->json([
         'status' => 'error',
         'message' => 'Error al obtener el detalle del combo.',
         'error' => $e->getMessage(),
       ], 500);
     }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

        $request->validate([
            'id_combo' => 'required|integer',
            'id_pieza' => 'required|integer',
            'cantidad' => 'required|integer',
        ]);

        $comboPiezaDetalle = ComboPiezaDetalle::findOrFail($id);
        $comboPiezaDetalle->update($request->all());
        return response()->json($comboPiezaDetalle);

    } catch (ValidationException $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Error de validación.',
            'errors' => $e->errors(),
        ], 422);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Detalle del combo no encontrado.',
        ], 404);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Error al actualizar el detalle del combo.',
            'error' => $e->getMessage(),
        ], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $comboPiezaDetalle = ComboPiezaDetalle::findOrFail($id);
            $comboPiezaDetalle->delete();
            return response()->json(null, 204);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Detalle del combo no encontrado.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar el detalle del combo.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
