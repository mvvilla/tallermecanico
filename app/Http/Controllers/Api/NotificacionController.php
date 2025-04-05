<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notificacion;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notificacion = Notificacion::all();
        return response()->json($notificacion);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integrer',
            'mensaje' => 'required|integrer',
            'estado' => 'sometimes|in:pendiente,enviado',
        ]);
        $notificacion = Notificacion::create([
            'id_institucion' => $request->id_institucion,
            'id_vehiculo' => $request->id_vehiculo
        ]);
 
        return response()->json($notificacion, 201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notificacion = Notificacion::findOrFail($id);
        return response()->json($notificacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_usuario' => 'required|integrer',
            'mensaje' => 'required|integrer',
            'estado' => 'sometimes|in:pendiente,enviado',
        ]);

        $notificacion = Notificacion::findOrFail($id);
        $notificacion->update($request->all());
        return response()->json($vehiculo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->delete();
        return response()->json(null, 204);
    }
}
