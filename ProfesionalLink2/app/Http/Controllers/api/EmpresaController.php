<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\EmpresaModel;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function get(){
        $empresas = EmpresaModel::all();

        if($empresas->isEmpty()){
            $data = [
                'mensaje' => 'no hay contenido',
                'status' => '404'
            ];
        return response() ->json($data,400);
        };
        return response()->json($empresas,200);
    }
    public function getAll($id){
        return response()->json([]);
    }
    public function create(){
        return "create link";
    }
    public function update(Request $request){
        return response()->json([]);
    }
    public function delete(Request $request){
        return response()->json([]);
    }
}
