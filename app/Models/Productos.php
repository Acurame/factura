<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $primaryKey = 'productoId';
    use HasFactory;
    protected $fillable = [
        'nombreProducto',
        'precio',
        'stock',
    ];
}
