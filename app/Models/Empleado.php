<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'clave_empleado',
        'nombre_completo',
        'ubicacion',
        'codigo_puesto',
        'puesto',
        'fecha_nacimiento',
        'dni',
        'fecha_inicio',
        'telefono',
        'correo',
        'nivel_educativo',
        'profesion',
        'direccion'
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function deducciones()
    {
        return $this->hasMany(Deduccion::class);
    }

    public function debeRecibirVacaciones()
    {
        $fechaIngreso = Carbon::parse($this->fecha_ingreso);
        $hoy = Carbon::now();

        // Si ha pasado 1 año desde la fecha de ingreso en el mismo mes y día
        return $hoy->diffInYears($fechaIngreso) >= 1 && $hoy->format('m-d') == $fechaIngreso->format('m-d');
    }

}
