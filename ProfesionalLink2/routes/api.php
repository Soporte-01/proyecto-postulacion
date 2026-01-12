<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AsociationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\DesignController;



Route::get('/empresa', [EmpresaController::class,'get']);
Route::get('/empresa/{id}', [EmpresaController::class,'getAll']);
Route::post('/empresa', [EmpresaController::class,'create']);
Route::patch('/empresa/{id}', [EmpresaController::class,'update']);
Route::delete('/empresa/{id}', [EmpresaController::class,'delete']);

Route::get('/user', [UserController::class,'getAll']);
Route::post("/login", [UserController::class,"login"]);
Route::post("/register", [UserController::class,"register"]);
Route::patch('/user/{id}', [UserController::class,'update']);
Route::delete('/user/{id}', [UserController::class,'delete']);

Route::get('/design', [DesignController::class,'get']);
Route::get('/design/{id}', [DesignController::class,'getAll']);
Route::post('/design', [DesignController::class,'create']);
Route::patch('/design/{id}', [DesignController::class,'update']);
Route::delete('/design/{id}', [DesignController::class,'delete']);

Route::get('/otherUser', [AsociationController::class,'get']);
Route::get('/otherUser/{id}', [AsociationController::class,'getAll']);
Route::post('/otherUser', [AsociationController::class,'create']);
Route::patch('/otherUser/{id}', [AsociationController::class,'update']);
Route::delete('/otherUser/{id}', [AsociationController::class,'delete']);
