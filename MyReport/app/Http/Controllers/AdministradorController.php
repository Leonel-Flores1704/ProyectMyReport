<?php

namespace App\Http\Controllers;
use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller{
    public function index(){
        $administradores = Administrador::where('id', auth()->id())->get();
        return view('administrador', compact('administradores'));
    }
}