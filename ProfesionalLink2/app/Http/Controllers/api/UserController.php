<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{   
    public function login(Request $request){
    }
    public function register(Request $request){
        $validator= validator::make($request->all(), [
            "name"=> "required",
            "password"=> "required"
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
                "password"=> $request->password
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
    public function get(){
        return response()->json([]);
    }
    public function getAll(Request $request){
        return response()->json([]);
    }
    public function create(Request $request){
        return response()->json([]);
    }
    public function update(Request $request){
        return response()->json([]);
    }
    public function delete(Request $request){
        return response()->json([]);
    }
}
