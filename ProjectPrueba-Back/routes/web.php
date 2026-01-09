<?php

use App\Http\Controllers\EscritoresControllers;
use App\Http\Controllers\LeidosControllers;
use App\Http\Controllers\LibroControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginControllers;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/libro',function(){
    return "ruta abilitada";
});
// Route::post('/api/users/login',[LoginControllers::class,'login']);

// Route::get('/api/libro',[LibroControllers::class,'mostrar']);
// Route::get('/api/libro/{id}',[LibroControllers::class,'mostrarTodos']);
// Route::post('/api/libro',[LibroControllers::class,'crear']);
// Route::patch('/api/libro/{id}',[LibroControllers::class,'editar']);
// Route::delete('/api/libro/{id}',[LibroControllers::class,'borrar']);


// Route::get('/api/escritores',[EscritoresControllers::class,'mostrar']);
// Route::get('/api/escritores/{id}',[EscritoresControllers::class,'mostrarTodos']);
// Route::post('/api/escritores',[EscritoresControllers::class,'crear']);
// Route::patch('/api/escritores/{id}',[EscritoresControllers::class,'editar']);
// Route::delete('/api/escritores/{id}',[EscritoresControllers::class,'borrar']);

// Route::get('/api/leidos',[LeidosControllers::class,'mostrar']);
// Route::post('/api/leidos/{id_user}/{id_libre}',[LeidosControllers::class,'crear']);
// Route::delete('/api/leidos/{id}',[LeidosControllers::class,'borrar']);