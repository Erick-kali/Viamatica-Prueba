<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;  // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    // Obtener todos los catálogos
    public function index()
    {
        $catalogos = Catalogo::all();
        return response()->json($catalogos);
    }

    // Obtener un catálogo por ID
    public function show($id)
    {
        $catalogo = Catalogo::find($id);
        if ($catalogo) {
            return response()->json($catalogo);
        } else {
            return response()->json(['message' => 'Catálogo no encontrado'], 404);
        }
    }
}
