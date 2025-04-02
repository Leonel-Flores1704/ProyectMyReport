<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoReporte;

class TipoReporte extends Model
{
    use HasFactory;
    protected $table = 'tipos_reporte'; // Asegúrate de que apunta a la tabla correcta

    protected $fillable = ['nombre'];
}
