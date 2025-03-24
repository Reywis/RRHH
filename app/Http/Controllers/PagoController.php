<?php

namespace App\Http\Controllers;
use App\Models\Pago;
use App\Models\Empleado;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pagos = Pago::with('empleado')->get();
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         // Busca el empleado o lanza un error 404
         $empleados = Empleado::all();
         return view('pagos.create',compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'sueldo' => 'required|numeric|min:0',
            'bonificaciones' => 'numeric|min:0',
            'deducciones' => 'numeric|min:0',
            'fecha_pago' => 'required|date'
        ]);

        $pago = Pago::create($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        //
        return response()->json($pago->load('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pago = Pago::findOrFail($id); // Busca el empleado o lanza un error 404
        return view('pagos.edit', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'sueldo' => 'required|numeric|min:0',
            'bonificaciones' => 'numeric|min:0',
            'deducciones' => 'numeric|min:0',
            'fecha_pago' => 'required|date'
        ]);

        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        //
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago Eliminado correctamente.');
    }
}
