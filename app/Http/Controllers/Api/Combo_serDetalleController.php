<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Combo_serDetalle;

class Combo_serDetalleController extends Controller
{

    public function index()
    {
        try {

            $combo_serDetalle = Combo_serDetalle::all();
            return response()->json($combo_serDetalle);

        } catch (\Exception $e) {
           return response()->json([
            'status' => 'error',
            'message' => 'Error al obtener los detalles del combo.',
            'error' => $e->getMessage(),
           ], 500);
        }
    }

   
    public function store(Request $request)
    {
        try {

           $request->validate([
            'id_combo' => 'required|integer',
            'id_servicio' => 'required|integer',
           ]);

           $combo_serDetalle = Combo_serDetalle::create([
            'id_combo' => $request->id_combo,
            'id_servicio' => $request->id_servicio,
           ]);
 
           return response()->json($combo_serDetalle, 201);

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

  
    public function show(string $id)
    {
        try {

                $combo_serDetalle = Combo_serDetalle::findOrFail($id);
                return response()->json($combo_serDetalle);

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


    public function update(Request $request, string $id)
    {
        try {
             $request->validate([
            'id_combo' => 'required|integer',
            'id_servicio' => 'required|integer',
             ]);


            $combo_serDetalle = Combo_serDetalle::findOrFail($id);
            $combo_serDetalle->update($request->all());
            return response()->json($combo_serDetalle);
        
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

 
    public function destroy(string $id)
    {
        try {

            $combo_serDetalle = Combo_serDetalle::findOrFail($id);
            $combo_serDetalle->delete();
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
