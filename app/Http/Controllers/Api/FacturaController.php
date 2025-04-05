<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Factura;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factura = Factura::all();

        $facturasPersonalizadas = $factura->map(function ($factura) {
            return [
                'id' => $factura->id,
                'id_orden' => $factura->id_orden,
                'id_cliente' => $factura->id_cliente,
                'total' => $factura->total,
                'iva' => $factura->iva,
                'estado' => $factura->estado,
                'nombre_cliente' => $factura->cliente->nombre,
            ];
        });
    
        return response()->json($facturasPersonalizadas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_orden' => 'required|integer',
            'id_cliente' => 'required|integer',
            'total' => 'required|numeric|min:1',
            'iva' => 'required|numeric|min:1',
            'estado' => 'required|in:pendiente,pagado,cancelado',
        ]);
        
        $factura = Factura::create([
            'id_orden' => $request->id_orden,
            'id_cliente' => $request->id_cliente,
            'total' => $request->total,
            'iva' => $request->iva,
            'estado' => $request->estado,
        ]);

        return response()->json($factura, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $factura = Factura::with('cliente:id,nombre')->findOrFail($id);
        return response()->json($factura);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_orden' => 'required|integer',
            'id_cliente' => 'required|integer',
            'total' => 'required|numeric|min:1',
            'iva' => 'required|numeric|min:1',
            'estado' => 'required|in:pendiente,pagado,cancelado',
        ]);

        $factura = Factura::findOrFail($id);
        $factura->update($request->all());
        return response()->json($factura);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();
        return response()->json(null, 204);
    }
}
