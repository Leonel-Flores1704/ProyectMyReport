<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;

class ReporteController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'calle_actual' => 'nullable|string',
            'colonia_actual' => 'nullable|string',
            'calle_manual' => 'nullable|string',
            'colonia_manual' => 'nullable|string',
            'calle1' => 'nullable|string',
            'calle2' => 'nullable|string',
            'descripcion_problematica' => 'required|string',
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
        $calle = $request->calle_actual ?? $request->calle_manual;
        $colonia = $request->colonia_actual ?? $request->colonia_manual;
        // Guardar el reporte en la base de datos
        $reporte = Reporte::create([
            'user_id' => auth()->id(), // Ajusta según tu lógica de usuarios
            'admin_verificador_id' => null, // O el valor correcto si aplica
            'tipo_reporte_id' => $request->tipo_reporte_id,
            'descripcion_problematica' => $request->descripcion_problematica,
            'calle' => $calle,
            'colonia' => $colonia,
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

    public function obtenerReportes()
    {
    $reportes = Reporte::where('estado', 'Completado')->get();

    // Decodifica la imagen antes de enviarla
    $reportes->transform(function ($reporte) {
        $imagenes = json_decode($reporte->imagen_referencia, true); // Convierte el JSON en array
        $reporte->imagen_referencia = $imagenes[0] ?? 'default.jpg'; // Usa la primera imagen o una por defecto
        return $reporte;
    });

    return response()->json($reportes);
    }
    public function index(){
        $reportes = Reporte::where('user_id', auth()->id())->get();
        return view('myreports', compact('reportes'));
    }

}