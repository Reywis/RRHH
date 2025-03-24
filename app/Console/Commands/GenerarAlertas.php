<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contrato;
use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GenerarAlertas extends Command
{
    protected $signature = 'alertas:generar';
    protected $description = 'Genera alertas para renovación de contratos y pago de vacaciones';

    public function handle()
    {
        // Alertas de renovación de contratos
        $contratosPorVencer = Contrato::whereNotNull('fecha_fin')
            ->where('fecha_fin', '<=', Carbon::now()->addDays(30))
            ->get();

        foreach ($contratosPorVencer as $contrato) {
            Log::info("⚠️ El contrato de {$contrato->empleado->nombre_completo} vence el {$contrato->fecha_fin}");
        }

        // Alertas de pago de vacaciones (según fecha de ingreso)
        $empleadosConVacaciones = Empleado::whereMonth('fecha_inicio', Carbon::now()->month)
            ->get();

        foreach ($empleadosConVacaciones as $empleado) {
            Log::info("📅 {$empleado->nombre_completo} tiene derecho a pago de vacaciones este mes.");
        }

        $this->info('✅ Alertas generadas y registradas en el log.');
    }
}
