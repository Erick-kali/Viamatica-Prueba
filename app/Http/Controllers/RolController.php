<?php

namespace App\Http\Controllers;

use App\Models\Rol;  // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Obtener todos los roles
    public function index()
    {
        $roles = Rol::all();
        return response()->json($roles);
    }

    // Obtener un rol por ID
    public function show($id)
    {
        $rol = Rol::find($id);
        if ($rol) {
            return response()->json($rol);
        } else {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }
    }
}
