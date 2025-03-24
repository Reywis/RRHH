<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deduccion;

class DeduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deducciones = Deduccion::with('empleado')->get();
        return response()->json($deducciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Deduccion $deduccion)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'tipo_deduccion' => 'required|string',
            'monto' => 'required|numeric|min:0',
            'fecha_deduccion' => 'required|date'
        ]);

        $deduccion = Deduccion::create($request->all());

        return response()->json($deduccion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json($deduccion->load('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deduccion $deduccion)
    {
        $request->validate([
            'tipo_deduccion' => 'required|string',
            'monto' => 'required|numeric|min:0',
            'fecha_deduccion' => 'required|date'
        ]);

        $deduccion->update($request->all());

        return response()->json($deduccion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deduccion $deduccion)
    {
        $deduccion->delete();

        return response()->json(['message' => 'Deducción eliminada correctamente']);
    }
}
