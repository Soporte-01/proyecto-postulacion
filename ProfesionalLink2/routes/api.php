<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\DesignController;
use App\Http\Controllers\Api\UserEmpresaController;


Route::get('/user', [UserController::class,'getAll']);
Route::post("/login", [UserController::class,"login"]);
Route::post("/user", [UserController::class,"register"]);
Route::patch('/user/{id}', [UserController::class,'update']);
Route::delete('/user/{id}', [UserController::class,'delete']);

Route::get('/empresa', [EmpresaController::class,'getAll']);
Route::get('/empresa/{id}', [EmpresaController::class,'get']);
Route::post('/empresa', [EmpresaController::class,'create']);
Route::patch('/empresa/{id}', [EmpresaController::class,'update']);
Route::delete('/empresa/{id}', [EmpresaController::class,'delete']);


Route::get('/design', [DesignController::class,'getAll']);
Route::get('/design/{id}', [DesignController::class,'get']);
Route::post('/design', [DesignController::class,'create']);
Route::patch('/design/{id}', [DesignController::class,'update']);
Route::delete('/design/{id}', [DesignController::class,'delete']);

Route::get('/userEmpresa', [UserEmpresaController::class,'getAll']);
Route::get('/userEmpresa/idbyuser/{id}', [UserEmpresaController::class,'getAllUserId']);
Route::get('/userEmpresa/idbyempresa/{id}', [UserEmpresaController::class,'getAllUserId']);
Route::get('/userEmpresa/{id}', [UserEmpresaController::class,'get']);
Route::post('/userEmpresa', [UserEmpresaController::class,'create']);
Route::delete('/userEmpresa/{id}', [UserEmpresaController::class,'delete']);
