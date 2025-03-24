<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Empleado;
use Carbon\Carbon;

class ReciboController extends Controller
{
    public function generarReciboPDF($id)
    {
        Carbon::setLocale('es');
        $empleado = Empleado::findOrFail($id);
         // Datos del recibo (puedes obtenerlos de la base de datos)
         $datos = [
            'fecha' => now()->format('d/m/Y'),
            'mes' => ucfirst(Carbon::now()->translatedFormat('F')), // Obtiene el mes en texto
            'nombre' => $empleado->nombre_completo,
            'codigo' => $empleado->codigo_puesto, // Asumiendo que tiene un código único
            'actividad' => 'JEFATURA DEPTO DE FOR.A DIST. (E-LEARNING)',
            'sueldobruto' => 49410.00,
            'deducciones' => [
                ['concepto' => 'Seguro', 'monto' => 366.51],
                ['concepto' => 'Sindicato', 'monto' => 741.15],
                ['concepto' => 'Ret. Especial', 'monto' => 1200.00],
            ],
            'total_deducciones' => 2307.66,
            'total_neto' => 47102.34,
        ];

        // Cargar la vista del PDF y pasar los datos
       // $pdf = PDF::loadView('recibos.pdf', $datos)->setPaper('a4');
        $pdf = PDF::loadView('recibos.pdf', $datos)->setPaper('a4', 'landscape');

        // Descargar el PDF
        return $pdf->stream('recibos.pdf');
    }
}
