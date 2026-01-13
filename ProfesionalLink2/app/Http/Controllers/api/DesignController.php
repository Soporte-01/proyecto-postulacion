<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\DesignModel;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function getAll(){
        $designs = DesignModel::all();

        if($designs->isEmpty()){
            $data = [
                'mensaje' => 'no hay contenido',
                'status' => '404'
            ];
        return response() ->json($data,400);
        };
        return response()->json($designs,200);
    }
    public function get($id){
        $design = DesignModel::find($id);

        if (!$design) {
            return response()->json([
                "mensaje" => "design no encontrado",
                "status" => 404
            ], 404);
        }
        return response()->json($design,200);
    }
    public function create(Request $request){
        $validator= validator::make($request->all(), [
            "puesto"=> "required|min:2",
            "color1"=> "min:5",
            "color2"=> "min:5",
            "link1"=> "min:5",
            "link2"=> "min:5",
            "link3"=> "min:5",
            ]);
            if ($validator->fails()){
                $data=[
                    "mensaje"=> "error",
                    "errors"=>$validator->errors(),
                    "status"=>400
                ];
                return response()->json($data,400);
            };
            $design=DesignModel::create([
                "puesto"=> $request->puesto,
                "color1"=> $request->color1,
                "color2"=> $request->color2,
                "link1"=> $request->link1,
                "link2"=> $request->link2,
                "link3"=> $request->link3
            ]);
            if (!$design){
                $data=[
                    "mensaje"=> "error al crear design",
                    "status"=>500
                ];
                return response()->json($data,500);
            };
            return response()->json($design,201);
    }
    public function update(Request $request){
        $design = DesignModel::find($request->id);

        if (!$design) {
            return response()->json([
                "mensaje" => "design no encontrado",
                "status" => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            "puesto"=> "required|min:2",
            "color1"=> "min:5",
            "color2"=> "min:5",
            "link1"=> "min:5",
            "link2"=> "min:5",
            "link3"=> "min:5",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "mensaje" => "error de validacion",
                "errors" => $validator->errors(),
                "status" => 400
            ], 400);
        }

        $design->puesto = $request->puesto;
        $design->color1 = $request->color1;
        $design->color2 = $request->color2;
        $design->link1 = $request->link1;
        $design->link2 = $request->link2;
        $design->link3 = $request->link3;
        $design->save();

        return response()->json([
            "design" => $design,
            "status" => 200
        ], 200);
    }
    public function delete($id){
        $design = DesignModel::find($id);

        if (!$design) {
            return response()->json([
                "mensaje" => "design no encontrado",
                "status" => 404
            ], 404);
        }

        // Eliminar empresa
        $design->delete();

        return response()->json([
            "mensaje" => "design eliminado correctamente",
            "status" => 200
        ], 200);
    }
}
