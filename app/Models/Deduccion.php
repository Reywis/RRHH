<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'empleado_id',
        'tipo_deduccion',
        'monto',
        'fecha_deduccion'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
