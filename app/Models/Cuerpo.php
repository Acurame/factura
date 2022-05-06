<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuerpo extends Model
{
    protected $table = 'cuerpo';
    protected $primaryKey = 'detalleId';
    use HasFactory;
    protected $fillable = [
        'cantida',
        'precio',
        'numeroFactura',
        'productoId'
    ];
}
