<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\EmpresaModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function getAll(){
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
    public function get($id){
        $empresa = EmpresaModel::find($id);
        if (!$empresa) {
            return response()->json([
                "mensaje" => "Empresa no encontrado",
                "status" => 404
            ], 404);
        }
        return response()->json($empresa,200);
    }
    public function create(Request $request){
        $validator= validator::make($request->all(), [
            "nombre"=> "required|min:2",
            "logo"=> "",
            "email"=> "required|email|unique:user,email",
            "sitio_web"=> "required|min:7",
            ]);
            if ($validator->fails()){
                $data=[
                    "mensaje"=> "error",
                    "errors"=>$validator->errors(),
                    "status"=>400
                ];
                return response()->json($data,400);
            };
            $empresa=EmpresaModel::create([
                "nombre"=> $request->nombre,
                "logo"=> $request->logo,
                "email"=> $request->email,
                "sitio_web"=> $request->sitio_web
            ]);
            if (!$empresa){
                $data=[
                    "mensaje"=> "error al crear empresa",
                    "status"=>500
                ];
                return response()->json($data,500);
            };
            $data=[
                "mensaje"=>"empresa creada",
                "empresa"=>$empresa,
                "status"=>201
            ];
            return response()->json($data,201);
    }
    public function update(Request $request){
        $empresa = EmpresaModel::find($request->id);
        if (!$empresa) {
            return response()->json([
                "mensaje" => "Empresa no encontrado",
                "status" => 404
            ], 404);
        }
        $validator= validator::make($request->all(), [
            "nombre"=> "min:2",
            "logo"=> "",
            "email"=> "email|unique:user,email,".$request->id,
            "sitio_web"=> "min:7",
            ]);

            if ($validator->fails()){
                $data=[
                    "mensaje"=> "error",
                    "errors"=>$validator->errors(),
                    "status"=>400
                ];
                return response()->json($data,400);
            };
            $empresa->nombre = $request->nombre ? $request->nombre : $empresa->nombre;
            $empresa->logo = $request->logo ? $request->logo : $empresa->logo;
            $empresa->email = $request->email ? $request->email : $empresa->email;
            $empresa->sitio_web = $request->sitio_web ? $request->sitio_web : $empresa->sitio_web;

            $empresa->save();

            return response()->json([
                "mensaje"=>"Empresa actualizado correctamente",
                "empresa"=>$empresa,
                "status"=>200
            ],200);
    }
    public function delete($id){
         // Buscar empresa por ID
        $empresa = EmpresaModel::find($id);

        if (!$empresa) {
            return response()->json([
                "mensaje" => "Empresa no encontrado",
                "status" => 404
            ], 404);
        }

        // Eliminar empresa
        $empresa->delete();

        return response()->json([
            "mensaje" => "Empresa eliminado correctamente",
            "status" => 200
        ], 200);
    }
}
