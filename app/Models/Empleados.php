<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'empleadoId';
    use HasFactory;
    protected $fillable = [
        'Nombre',
        'apellidos',
        'edad',
        'salario'
    ];
}
