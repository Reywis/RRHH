<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'clave_empleado' => 'required|unique:empleados',
            'nombre_completo' => 'required',
            'ubicacion' => 'required',
            'codigo_puesto' => 'required',
            'puesto' => 'required',
            'fecha_nacimiento' => 'required|date',
            'dni' => 'required|unique:empleados',
            'fecha_inicio' => 'required|date',
            'telefono' => 'nullable',
            'correo' => 'nullable|email',
            'nivel_educativo' => 'nullable',
            'profesion' => 'nullable',
            'direccion' => 'nullable',
        ]);

        $empleado = Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
        return response()->json($empleado);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::findOrFail($id); // Busca el empleado o lanza un error 404
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $empleado->update($request->all());

        $empleados = Empleado::all();
        return redirect()->route('empleados.index')->with('success', 'Empleado editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
        $empleado->delete();

        $empleados = Empleado::all();
        return redirect()->route('empleados.index')->with('success', 'Empleado Eliminado correctamente correctamente.');
    }
}
