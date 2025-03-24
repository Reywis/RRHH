<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Empleado::create([
            'clave_empleado' => 'EMP001',
            'nombre_completo' => 'Juan Pérez',
            'ubicacion' => 'Oficina Central',
            'codigo_puesto' => 'A001',
            'puesto' => 'Analista de Sistemas',
            'fecha_nacimiento' => '1990-05-15',
            'dni' => '123456789',
            'fecha_inicio' => '2022-01-10',
            'telefono' => '987654321',
            'correo' => 'juan.perez@example.com',
            'nivel_educativo' => 'Universitario',
            'profesion' => 'Ingeniero en Sistemas',
            'direccion' => 'Calle 123, Ciudad'
        ]);
    }
}
