<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contrato;
use App\Models\Empleado;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        //
        public function run()
        {
            $empleado = Empleado::first(); // Obtiene el primer empleado

            Contrato::create([
                'empleado_id' => $empleado->id,
                'tipo_contrato' => 'Permanente',
                'fecha_inicio' => '2022-01-10',
                'fecha_fin' => null, // Sin fecha de finalización
                'renovable' => true
            ]);
        }

}
