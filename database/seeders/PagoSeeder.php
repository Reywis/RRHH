<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pago;
use App\Models\Empleado;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleado = Empleado::first(); // Obtiene el primer empleado

        Pago::create([
            'empleado_id' => $empleado->id,
            'sueldo' => 2500.00,
            'bonificaciones' => 500.00,
            'deducciones' => 200.00,
            'fecha_pago' => now()
        ]);
    }
}
