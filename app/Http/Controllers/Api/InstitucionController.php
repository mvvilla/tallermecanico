<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institucion;


class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institucion = Institucion::all();
        return response()->json($institucion);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|string|email|max:100',
            'direccion' => 'nullable|string|max:150'
        ]);

        $institucion = Institucion::create([
            'nombre' => $request->nombre,
            'contacto' => $request->contacto,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
        ]);

        return response()->json($institucion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $institucion = Institucion::findOrFail($id);
        return response()->json($institucion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|string|email|max:100',
            'direccion' => 'nullable|string|max:150'
        ]);

        $institucion = Institucion::findOrFail($id);
        $institucion->update($request->all());
        return response()->json($institucion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $institucion = institucion::findOrFail($id);
        $institucion->delete();
        return response()->json(null, 204);
    }
}
