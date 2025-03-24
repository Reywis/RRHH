<?php

namespace App\Exports;

use App\Models\Pago;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Empleado;

class PagosExport implements FromCollection, WithHeadings, WithMapping
{
    protected $mes;

    public function __construct($mes)
    {
        $this->mes = $mes;
    }

    public function collection()
    {
        return Empleado::with('pagos')
            ->whereHas('pagos', function ($query) {
                $query->whereMonth('fecha_pago', $this->mes);
            })
            ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Código', 'Sueldo Bruto', 'Deducciones', 'Sueldo Neto'];
    }

    public function map($empleado): array
    {
        $sueldoBruto = $empleado->pagos->sum('monto');
        $deducciones = $empleado->pagos->sum('deducciones');
        $sueldoNeto = $sueldoBruto - $deducciones;

        return [
            $empleado->id,
            $empleado->nombre_completo,
            $empleado->codigo_puesto,
            number_format($sueldoBruto, 2),
            number_format($deducciones, 2),
            number_format($sueldoNeto, 2),
        ];
    }
}
