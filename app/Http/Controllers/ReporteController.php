<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PagosExport;
use App\Models\Empleado;

class ReporteController extends Controller
{
    public function exportarPagos(Request $request)
    {
        // Validar que el mes esté presente y sea un número válido
        $request->validate([
            'mes' => 'required|integer|min:1|max:12'
        ]);

        $mes = $request->input('mes');

        return Excel::download(new PagosExport($mes), 'reporte_pagos_'.$mes.'.xlsx');
    }
}
