<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Combo_servicio;


class Combo_servicioController extends Controller
{

    public function index()
    {
        try {

              $combo_servicio = Combo_servicio::all();
              return response()->json($combo_servicio);
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
            'nombre' => 'required|string|max:100',
            'modelo_vehiculo' => 'required|string|max:50',
            'precio_total' => 'required|numeric|min:1',
            'descripcion' => 'nullable|string',
        ]);
 
        $combo_servicio = Combo_servicio::create([
            'nombre' => $request->nombre,
            'modelo_vehiculo' => $request->modelo_vehiculo,
            'precio_total' => $request->precio_total,
            'descripcion' => $request->descripcion,
        ]);
 
        return response()->json($combo_servicio, 201);

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

       $combo_servicio = Combo_servicio::findOrFail($id);
       return response()->json($combo_servicio);
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
            'nombre' => 'required|string|max:100',
            'modelo_vehiculo' => 'required|string|max:50',
            'precio_total' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
        ]);

        $combo_servicio = Combo_servicio::findOrFail($id);
        $combo_servicio->update($request->all());
        return response()->json($combo_servicio);

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
        $combo_servicio = Combo_servicio::findOrFail($id);
        $combo_servicio->delete();
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
