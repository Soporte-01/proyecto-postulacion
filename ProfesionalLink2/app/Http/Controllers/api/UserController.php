<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $user=$request->name;
        $password = $request->password;

        $user = UserModel::where('name', $user)->first();

        if (!$user) {
            return response()->json([
                "mensaje" => "Usuario no encontrado",
                "status" => 404
            ], 404);
        }

        // Verifica el hash de la contraseña
        if (!Hash::check($password, $user->password)) {
            return response()->json([
                "mensaje" => "Contraseña incorrecta",
                "status" => 401
            ], 401);
        }

        return response()->json([
            "mensaje" => "Bienvenido",
            "user" => $user,
            "status" => 200
        ], 200);
    }
    public function register(Request $request){
        $validator= validator::make($request->all(), [
            "name"=> "required|min:2",
            "password"=> "",
            "email"=> "required|email|unique:user,email",
            "foto"=> "nullable|image|max:2048",
            ]);
            if ($validator->fails()){
                $data=[
                    "mensaje"=> "error",
                    "errors"=>$validator->errors(),
                    "status"=>400
                ];
                return response()->json($data,400);
            };
            $user=UserModel::create([
                "name"=> $request->name,
                "password"=> hash::make($request->password)
            ]);
            if (!$user){
                $data=[
                    "mensaje"=>"error",
                    "status"=>500
                ];
                return response()->json($data);
            }
            $data=[
                "user"=>$user,
                "status"=>200
                ];
            return response()->json($data,201);

    }
    public function getAll(){
        $user = UserModel::all();
        $data=[
            "users"=>$user,
            "status"=> 200
        ];
        return response()->json($data,200);
    }

    // public function get($id){
    //     $user = UserModel::find($id);
    //     if(!$user){
    //         $data=[
    //             "mesaje"=> "no encontrado",
    //             "status"=> "404"
    //         ];
    //         return response()->json($data,404);
    //     }
    //     $data=[
    //         "users"=>$user,
    //         "status"=> 200
    //     ];
    //     return response()->json($data,200);
    // }

    public function update(Request $request){
        // Buscar usuario por id
        $user = UserModel::find($request->id);
        if (!$user) {
            return response()->json([

                "mensaje" => "Usuario no encontrado",
                "status" => 404
            ], 404);
        }

        // Validar datos
        $validator = Validator::make($request->all(), [
            "name" => "required|min:2",
            "password" => "",
            "email" => "required|email|unique:user,email",
            "foto" => "nullable|image|max:2048"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "mensaje" => "Error de validación",
                "errors" => $validator->errors(),
                "status" => 422
            ], 422);
        }

        // Actualizar datos
        $user->name = $request->name;
        $user->password = Hash::make($request->password); // hash de contraseña
        $user->save();

        return response()->json([
            "mensaje" => "Usuario actualizado correctamente",
            "user" => $user,
            "status" => 200
        ], 200);
    }
    public function delete($id){
        $user = UserModel::find($id);

        if (!$user) {
            return response()->json([
                "mensaje" => "Usuario no encontrado",
                "status" => 404
            ], 404);
        }

        // Eliminar usuario
        $user->delete();

        return response()->json([
            "mensaje" => "Usuario eliminado correctamente",
            "status" => 200
        ], 200);
    }
}
