<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Empleado;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $asistencias = Asistencia::with('empleado')->get();
        return view('asistencias.index', compact('asistencias'));

    }

    public function create()
    {
        //
        $empleados = Empleado::all();
        return view('asistencias.create',compact('empleados'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'fecha' => 'required|date',
            'tipo' => 'required|in:Entrada,Salida,Presente,Permiso,Incapacidad,Suspensión',
            'detalle' => 'nullable|string'
        ]);

        $asistencia = Asistencia::create($request->all());


        return redirect()->route('asistencias.index')->with('success', 'Asistencia agregada correctamente.');
    }

    public function show(Asistencia $asistencia)
    {
        return response()->json($asistencia->load('empleado'));
    }

    public function edit(string $id)
    {
        //
        $empleados = Empleado::all();
        $asistencia = Asistencia::findOrFail($id);
        return view('asistencias.edit', compact('asistencia','empleados'));
    }

    public function update(Request $request, Asistencia $asistencia)
    {
        $request->validate([
            'tipo' => 'required|in:Presente,Vacaciones,Permiso,Incapacidad,Suspensión',
            'detalle' => 'nullable|string'
        ]);

        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente.');
    }

    public function destroy(Asistencia $asistencia)
    {
        $asistencia->delete();

        return redirect()->route('asistencias.index')->with('success', 'Asistencias eliminado correctamente.');
    }

}
