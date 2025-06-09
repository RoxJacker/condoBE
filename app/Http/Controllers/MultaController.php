<?php

namespace App\Http\Controllers;

use App\Models\Multa;

class MultaController extends Controller
{
    public function index()
    {
        // Obtener todas las multas con usuario y departamento
        $multas = Multa::with('usuario', 'departamento')->get();
        return response()->json($multas);
    }
}
