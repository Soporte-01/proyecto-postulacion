<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibroControllers extends Controller
{
    function mostrar (){
        $libros = Libro::all();
        return response()->json($libros);
    }
    function mostrarTodos ($id){
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['error' => 'Libro no encontrado'], 404);
        }
        return response()->json($libro);
    }
    function crear (Request $request){
        $datos = $request->all();

        // Validación simple
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anio' => 'nullable|integer',
        ]);

        $libro = Libro::create($datos);

        return response()->json([
            'mensaje' => 'Libro creado correctamente',
            'libro' => $libro
        ], 201);
    }
    function editar (Request $request, $id){
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['error' => 'Libro no encontrado'], 404);
        }

        $datos = $request->all();

        // Validación
        $request->validate([
            'titulo' => 'sometimes|required|string|max:255',
            'autor' => 'sometimes|required|string|max:255',
            'año' => 'nullable|integer',
        ]);

        $libro->update($datos);

        return response()->json([
            'mensaje' => 'Libro actualizado correctamente',
            'libro' => $libro
        ]);
    }
    function borrar ($id){
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['error' => 'Libro no encontrado'], 404);
        }

        $libro->delete();

        return response()->json(['mensaje' => 'Libro eliminado correctamente']);
        
    }
}