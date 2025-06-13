<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use Illuminate\Http\Request;

class MultaController extends Controller
{
    // Obtener todas las multas con usuario y departamento relacionados
    public function index()
    {
        $multas = Multa::with('usuario', 'departamento')->get();
        return response()->json($multas);
    }

    // Guardar una nueva multa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'departamento_id' => 'required|integer|exists:departamentos,id',
        ]);

        $multa = Multa::create($validated);

        return response()->json([
            'message' => 'Multa registrada exitosamente',
            'data' => $multa
        ], 201);
    }

    // Obtener una multa específica (opcional)
    public function show($id)
    {
        $multa = Multa::with('usuario', 'departamento')->findOrFail($id);
        return response()->json($multa);
    }

    // Actualizar una multa (opcional)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'descripcion' => 'sometimes|required|string',
            'fecha' => 'sometimes|required|date',
            'usuario_id' => 'sometimes|required|integer|exists:usuarios,id',
            'departamento_id' => 'sometimes|required|integer|exists:departamentos,id',
        ]);

        $multa = Multa::findOrFail($id);
        $multa->update($validated);

        return response()->json([
            'message' => 'Multa actualizada exitosamente',
            'data' => $multa
        ]);
    }

    // Eliminar una multa (opcional)
    public function destroy($id)
    {
        $multa = Multa::findOrFail($id);
        $multa->delete();

        return response()->json([
            'message' => 'Multa eliminada exitosamente'
        ]);
    }
}