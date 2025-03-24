<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Empleado;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::with('empleado')->get();
        return view('contratos.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $empleados = Empleado::all();
        return view('contratos.create',compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'tipo_contrato' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'renovable' => 'boolean'
        ]);

        $contrato = Contrato::create($request->all());

        return redirect()->route('contratos.index')->with('success', 'Empleado agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        return response()->json($contrato->load('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $contrato = Contrato::findOrFail($id);
        return view('contratos.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        //
        $request->validate([
            'tipo_contrato' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'renovable' => 'boolean'
        ]);

        $contrato->update($request->all());

        return redirect()->route('contratos.index')->with('success', 'Contrato actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
        //
        $contrato->delete();

        return redirect()->route('contratos.index')->with('success', 'Contrato eliminado correctamente.');
    }
}
