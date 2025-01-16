<?php

namespace App\Http\Controllers;

use App\Models\Aplicacion;
use Illuminate\Http\Request;

class AplicacionController extends Controller
{
    public function index()
    {
        return Aplicacion::all(); // Devuelve todas las aplicaciones
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_aplicacion' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'url' => 'nullable|string|max:100',
            'id_estado' => 'required|integer|exists:catalogo,id_catalogo',
        ]);

        $aplicacion = Aplicacion::create($data);
        return response()->json($aplicacion, 201);
    }

    public function show($id)
    {
        $aplicacion = Aplicacion::findOrFail($id);
        return response()->json($aplicacion);
    }

    public function update(Request $request, $id)
    {
        $aplicacion = Aplicacion::findOrFail($id);

        $data = $request->validate([
            'nombre_aplicacion' => 'sometimes|string|max:100',
            'descripcion' => 'nullable|string',
            'url' => 'nullable|string|max:100',
            'id_estado' => 'sometimes|integer|exists:catalogo,id_catalogo',
        ]);

        $aplicacion->update($data);
        return response()->json($aplicacion);
    }

    public function destroy($id)
    {
        $aplicacion = Aplicacion::findOrFail($id);
        $aplicacion->delete();
        return response()->json(['message' => 'Aplicación eliminada con éxito']);
    }
}
