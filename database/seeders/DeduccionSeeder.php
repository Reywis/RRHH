<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deduccion;
use App\Models\Empleado;

class DeduccionSeeder extends Seeder
{
    public function run()
    {
        $empleado = Empleado::first(); // Obtiene el primer empleado

        Deduccion::create([
            'empleado_id' => $empleado->id,
            'tipo_deduccion' => 'Seguro Social',
            'monto' => 150.00,
            'fecha_deduccion' => now()
        ]);

        Deduccion::create([
            'empleado_id' => $empleado->id,
            'tipo_deduccion' => 'Impuesto sobre la Renta',
            'monto' => 50.00,
            'fecha_deduccion' => now()
        ]);
    }
}
