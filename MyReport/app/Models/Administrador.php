<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administrador;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Administrador extends Model implements Authenticatable{
    use HasFactory, AuthenticatableTrait;
    protected $table = 'administradores'; // Asegúrate de que apunta a la tabla correcta

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'email',
        'password',
        'tipo_reporte_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function tipoReporte(){
        return $this->belongsTo(TipoReporte::class, 'tipo_reporte_id');
    }
}
