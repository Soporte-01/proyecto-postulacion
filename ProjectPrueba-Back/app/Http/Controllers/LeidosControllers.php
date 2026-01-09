<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leido;

class LeidosControllers extends Controller
{
    // Mostrar todos los libros leídos
    public function mostrar()
    {
        return ("hola")
        // $leidos = Leido::all();
        // return response()->json($leidos);
    }

    // Marcar un libro como leído
    public function crear(Request $request)
    {
        // Validación correcta
        $request->validate([
            'user_id'  => 'required|integer',
            'libro_id' => 'required|integer',
        ]);

        $leido = Leido::create([
            'user_id'  => $request->user_id,
            'libro_id' => $request->libro_id,
        ]);

        return response()->json([
            'mensaje' => 'Libro marcado como leído',
            'leido' => $leido
        ], 201);
    }

    // Borrar un registro de leído
    public function borrar($id)
    {
        $leido = Leido::find($id);

        if (!$leido) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $leido->delete();

        return response()->json(['mensaje' => 'Registro eliminado correctamente']);
    }
}
