<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $table = 'reportes'; // Asegúrate de que apunta a la tabla correcta

    protected $fillable = [
        'user_id',
        'admin_verificador_id',
        'tipo_reporte_id',  // Asegúrate de que este campo esté en el $fillable
        'descripcion_problemática',
        'calle',
        'colonia',
        'calle_entre_1',
        'calle_entre_2',
        'descripcion_ubicacion',
        'imagen_referencia',
        'fecha_reporte',
        'estado',
    ];
}
