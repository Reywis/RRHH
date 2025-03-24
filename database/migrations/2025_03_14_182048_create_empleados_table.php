<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('clave_empleado')->unique();
            $table->string('nombre_completo');
            $table->string('ubicacion');
            $table->string('codigo_puesto');
            $table->string('puesto');
            $table->date('fecha_nacimiento');
            $table->string('dni')->unique();
            $table->date('fecha_inicio');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('nivel_educativo')->nullable();
            $table->string('profesion')->nullable();
            $table->text('direccion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
