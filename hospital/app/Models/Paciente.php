<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
    'nombre',
    'nss',
    'afiliacion',
    'consultorio',
    'turno',
    'diagnostico',
    'fecha_inicio',
    'fecha_fin',
    'estatus'
];
public function getEstatusAttribute($value)
{
    if ($this->fecha_fin < now()) {
        return 'Vencido';
    }

    return $value;
}
}
