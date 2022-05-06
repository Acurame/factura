<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'clienteId';
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos',
        'sexo',
        'nit',
        'Edad'
    ];
}
