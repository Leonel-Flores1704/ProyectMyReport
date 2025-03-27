<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;

class ReporteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'calle1' => 'nullable|string',
            'calle2' => 'nullable|string',
            'descripcion_problematica' => 'required|string',
            'calle' => 'required|string',
            'colonia' => 'required|string',
            'descripcion_ubicacion' => 'required|string',
            'fecha_reporte' => 'required|date',
            'imagen_referencia' => 'nullable|array', // Permitir que sea un array
            'imagen_referencia.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // Validar cada archivo individualmente,
            'tipo_reporte_id' => 'required|exists:tipos_reporte,id',
        ]);
        $imagePaths = [];
        if ($request->hasFile('imagen_referencia')) {
            foreach ($request->file('imagen_referencia') as $image) {
                $imagePaths[] = $image->store('reporte', 'public');
            }
        }

        // Guardar el reporte en la base de datos
        $reporte = Reporte::create([
            'user_id' => auth()->id(), // Ajusta según tu lógica de usuarios
            'admin_verificador_id' => null, // O el valor correcto si aplica
            'tipo_reporte_id' => $request->tipo_reporte_id,
            'descripcion_problematica' => $request->descripcion_problematica,
            'calle' => $request->calle,
            'colonia' => $request->colonia,
            'calle_entre_1' => $request->calle1,
            'calle_entre_2' => $request->calle2,
            'descripcion_ubicacion' => $request->descripcion_ubicacion,
            'imagen_referencia' => json_encode($imagePaths), // Guarda la ruta de la imagen en la DB
            'fecha_reporte' => $request->fecha_reporte,
            'estado' => 'Pendiente', // Estado inicial
        ]);
        if ($reporte) {
            return back()->with('success', 'Reporte creado con éxito');
        } else {
            return back()->with('error', 'Hubo un problema al guardar el reporte');
        }
    }
}