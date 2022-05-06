<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encabezado extends Model
{
    protected $table = 'encabezado';
    protected $primaryKey = 'numeroFactura';
    use HasFactory;
    protected $fillable = [
        'fechaFactura',
        'empleadoId',
        'clienteId',
    ];
}
