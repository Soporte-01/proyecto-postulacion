<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\UserEmpresaModel;
use Illuminate\Http\Request;

class UserEmpresaController extends Controller
{
    public function getAll(){
        $userempresas = UserEmpresaModel::all();

        if($userempresas->isEmpty()){
            $data = [
                'mensaje' => 'no hay contenido',
                'status' => '404'
            ];
        return response() ->json($data,400);
        };
        return response()->json($userempresas,200);
    }
    public function get($id){
        $userempresa = UserEmpresaModel::find($id);

        if (!$userempresa) {
            return response()->json([
                "mensaje" => "empresa no encontrado",
                "status" => 404
            ], 404);
        }
        return response()->json($userempresa,200);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id'     => 'required|exists:user,id',
            'empresa_id'  => 'required|exists:empresa,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'error',
                'errors'  => $validator->errors(),
                'status'  => 400
            ], 400);
        }
        $userEmpresa = UserEmpresaModel::create([
            'user_id'     => $request->user_id,
            'empresa_id'  => $request->empresa_id
        ]);
        if (!$userEmpresa) {
            return response()->json([
                'mensaje' => 'error al asociar usuario con empresa',
                'status'  => 500
            ], 500);
        }
        return response()->json($userEmpresa, 201);
    }
    public function delete($id){
        $userempresa = UserEmpresaModel::find($id);

        if (!$userempresa) {
            return response()->json([
                "mensaje" => "Empresa no encontrado",
                "status" => 404
            ], 404);
        }

        // Eliminar empresa
        $userempresa->delete();

        return response()->json([
            "mensaje" => "Empresa eliminado correctamente",
            "status" => 200
        ], 200);
    }
}
