<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EscritoresControllers extends Controller
{
    function mostrar (){
        $escritores = Libro::all();
        return response()->json($escritores);
    }
    function mostrarTodos ($id){
        $escritores = Libro::find($id);
        if (!$escritores) {
            return response()->json(['error' => 'Escritor no encontrado'], 404);
        }
        return response()->json($escritores);
    }
    function crear (Request $request){
        $datos = $request->all();

        // Validación simple
        $request->validate([

            // editar
            'nombre' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
            'año' => 'nullable|integer',
        ]);

        $escritores = Libro::create($datos);

        return response()->json([
            'mensaje' => 'Escritor creado correctamente',
            'libro' => $escritores
        ], 201);
    }
    function editar (Request $request, $id){
        $escritores = Libro::find($id);
        if (!$escritores) {
            return response()->json(['error' => 'Escritor no encontrado'], 404);
        }

        $datos = $request->all();

        // Validación
        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'lugar' => 'sometimes|required|string|max:255',
            'año' => 'nullable|integer',
        ]);

        $escritores->update($datos);

        return response()->json([
            'mensaje' => 'Escritor actualizado correctamente',
            'libro' => $escritores
        ]);
    }
    function borrar (){
        $escritores = Libro::find($id);
        if (!$escritores) {
            return response()->json(['error' => 'Escritor no encontrado'], 404);
        }

        $escritores->delete();

        return response()->json(['mensaje' => 'Escritor eliminado correctamente']);
        
    }
}
