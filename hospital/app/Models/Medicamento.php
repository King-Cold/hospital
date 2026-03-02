<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = [
    'clave',
    'nombre',
    'unidad_medida',
    'precio_unitario',
    'stock'
];
}
