<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asistencia;
use App\Models\Empleado;

class AsistenciaSeeder extends Seeder
{
    public function run()
    {
        $empleado = Empleado::first(); // Obtiene el primer empleado

        Asistencia::create([
            'empleado_id' => $empleado->id,
            'fecha' => now(),
            'tipo' => 'Presente',
            'detalle' => 'Día laboral normal'
        ]);

        Asistencia::create([
            'empleado_id' => $empleado->id,
            'fecha' => now()->subDays(2),
            'tipo' => 'Vacaciones',
            'detalle' => 'Inicio de vacaciones'
        ]);
    }
}
