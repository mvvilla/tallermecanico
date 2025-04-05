<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
   // Obtener todos los usuarios
   public function index()
   {
       $usuario = Usuario::all();
       return response()->json($usuario);
   }


   public function store(Request $request)
   {
       $request->validate([
           'nombre' => 'required|string|max:100',
           'telefono' => 'nullable|string|max:20',
           'correo' => 'required|string|email|max:100|unique:usuarios',
           'contraseña' => 'required|string|min:10',
           'rol' => 'required|in:cliente,mecanico,admin,secretaria',
       ]);

       $usuario = Usuario::create([
           'nombre' => $request->nombre,
           'telefono' => $request->telefono,
           'correo' => $request->correo,
           'contraseña' => Hash::make($request->contraseña), // Encriptar la contraseña
           'rol' => $request->rol,
       ]);

       return response()->json($usuario, 201);
   }

   
   // Obtener un usuario por ID
   public function show($id)
   {
       $usuario = Usuario::findOrFail($id);
       return response()->json($usuario);
   }

   // Crear un nuevo usuario
   
   public function update(Request $request, $id)
   {
       $request->validate([
           'nombre' => 'sometimes|string|max:100',
           'telefono' => 'nullable|string|max:20',
           'correo' => 'sometimes|string|email|max:100|unique:usuarios,correo,' . $id,
           'contraseña' => 'sometimes|string|min:8',
           'rol' => 'sometimes|in:cliente,mecanico,admin,secretaria',
       ]);

       $usuario = Usuario::findOrFail($id);

       $data = $request->only(['nombre', 'telefono', 'correo', 'rol']);
       if ($request->has('contraseña')) {
           $data['contraseña'] = Hash::make($request->contraseña);
       }

       $usuario->update($data);

       return response()->json($usuario);
   }

   // Eliminar un usuario
   public function destroy($id)
   {
       $usuario = Usuario::findOrFail($id);
       $usuario->delete();
       return response()->json(null, 204);
   }
}
