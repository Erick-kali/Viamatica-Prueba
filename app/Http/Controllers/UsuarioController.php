<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importar la clase Hash

class UsuarioController extends Controller
{
    public function index()
    {
        // Obtiene todos los usuarios
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuario',
            'cedula' => 'required|integer|unique:usuario', // Validar cedula
            'contrasena' => 'required|string|min:8', // Validar que la contraseña sea válida
            'id_rol' => 'required|integer',
            'id_estado' => 'required|integer',
            'numero_intento' => 'nullable|integer',
        ]);

        // Hashear la contraseña antes de guardarla
        $validated['contrasena'] = Hash::make($validated['contrasena']);

        // Asignar valores predeterminados
        $validated['numero_intento'] = $validated['numero_intento'] ?? 0; // Predeterminado a 0
        $validated['status'] = 'activo'; // Establecer el estado como "activo" por defecto

        // Crear un nuevo usuario con los datos validados
        $usuario = Usuario::create($validated);

        // Retorna el usuario creado
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        // Buscar el usuario por su ID
        $usuario = Usuario::findOrFail($id);

        // Validar los datos de entrada
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cedula' => 'required|integer', // Validar cedula
            'contrasena' => 'nullable|string|min:8', // La contraseña es opcional al actualizar
            'id_rol' => 'required|integer',
            'id_estado' => 'required|integer',
            'numero_intento' => 'nullable|integer',
        ]);

        // Si se envió una nueva contraseña, hashearla antes de guardarla
        if (!empty($validated['contrasena'])) {
            $validated['contrasena'] = Hash::make($validated['contrasena']);
        } else {
            unset($validated['contrasena']); // Eliminar el campo para no sobrescribirlo con null
        }

        // Actualizar el usuario con los datos validados
        $usuario->update($validated);

        // Retorna el usuario actualizado
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete(); // Eliminar usuario

        // Enviar una respuesta con un mensaje
        return response()->json([
            'message' => 'Usuario eliminado correctamente'
        ], 200); // Código de estado 200 (OK)
    }
}
