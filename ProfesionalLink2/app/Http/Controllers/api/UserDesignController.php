<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\UserDesignModel;
use Illuminate\Http\Request;

class UserDesignController extends Controller
{
    public function getAll(){
        $userdesigns = UserDesignModel::all();

        if($userdesigns->isEmpty()){
            $data = [
                'mensaje' => 'no hay contenido',
                'status' => '404'
            ];
        return response() ->json($data,400);
        };
        return response()->json($userdesigns,200);
    }
    public function get($id){
        $userdesign = UserDesignModel::find($id);

        if (!$userdesign) {
            return response()->json([
                "mensaje" => "design no encontrado",
                "status" => 404
            ], 404);
        }
        return response()->json($userdesign,200);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id'   => 'required|exists:user,id',
            'design_id' => 'required|exists:design,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'error',
                'errors'  => $validator->errors(),
                'status'  => 400
            ], 400);
        }

        $userDesign = UserDesignModel::create([
            'user_id'   => $request->user_id,
            'design_id' => $request->design_id
        ]);

        if (!$userDesign) {
            return response()->json([
                'mensaje' => 'error al asociar usuario con diseño',
                'status'  => 500
            ], 500);
        }

        return response()->json($userDesign, 201);
    }
    public function delete($id){
               $userdesign = UserDesignModel::find($id);

        if (!$userdesign) {
            return response()->json([
                "mensaje" => "Empresa no encontrado",
                "status" => 404
            ], 404);
        }

        // Eliminar empresa
        $userdesign->delete();

        return response()->json([
            "mensaje" => "Empresa eliminado correctamente",
            "status" => 200
        ], 200);
    }
}
