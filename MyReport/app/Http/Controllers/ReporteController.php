<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;

class ReporteController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'calle1' => 'nullable|string',
            'calle2' => 'nullable|string',
            'descripcion_problematica' => 'required|string',
            'calle' => 'required|string',
            'colonia' => 'required|string',
            'descripcion_ubicacion' => 'required|string',
            'fecha_reporte' => 'required|date',
            'imagen_referencia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        //Esto concatena las calles y era la opcion mas fácil (en caso de cambiar de opcion me dicen)
        $calle = trim($request->calle1 . ' y ' . $request->calle2);
        // Guardar la imagen si se sube
        $path = null;
        if ($request->hasFile('imagen_referencia')) {
            $path = $request->file('imagen_referencia')->store('reportes', 'public');
        }

        // Guardar el reporte en la base de datos
        Reporte::create([
            'user_id' => auth()->id(), // Ajusta según tu lógica de usuarios
            'descripcion_problematica' => $request->descripcion_problematica,
            'calle' => $request->calle,
            'colonia' => $request->colonia,
            'descripcion_ubicacion' => $request->descripcion_ubicacion,
            'fecha_reporte' => $request->fecha_reporte,
            'imagen_referencia' => $path, // Guarda la ruta de la imagen en la DB
            'estado' => 'Pendiente', // Estado inicial
        ]);
        if ($reportes) {
            return back()->with('success', 'Reporte creado con éxito');
        } else {
            return back()->with('error', 'Hubo un problema al guardar el reporte');
        }
        // return back()->with('success', 'Reporte creado con éxito');
    }
}