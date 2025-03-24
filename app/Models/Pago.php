<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = [
        'empleado_id',
        'sueldo',
        'bonificaciones',
        'deducciones',
        'fecha_pago'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
