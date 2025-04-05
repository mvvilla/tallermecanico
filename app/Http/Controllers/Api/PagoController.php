<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pago;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pago = Pago::all();
        return response()->json($pago);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_factura' => 'required|integer',
            'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
            'monto' => 'required|numeric|min:1',
        ]);
          
        $pago = Pago::create([
            'id_factura' => $request->id_factura,
            'metodo_pago' => $request->metodo_pago,
            'monto' => $request->monto,
        ]);

        return response()->json($pago, 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pago = Pago::findOrFail($id);
        return response()->json($pago);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_factura' => 'required|integer',
            'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
            'monto' => 'required|numeric|min:1',
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());
        return response()->json($pago);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();
        return response()->json(null, 204);
    }
}
