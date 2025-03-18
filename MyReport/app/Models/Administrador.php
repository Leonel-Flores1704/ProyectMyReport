<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administrador;

class Administrador extends Model
{
    use HasFactory;
    protected $table = 'administradores'; // Asegúrate de que apunta a la tabla correcta

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'email',
        'password',
        'tipo_reporte_id',
    ];
}
