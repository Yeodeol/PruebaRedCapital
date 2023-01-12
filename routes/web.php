<?php

use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

 
// Rutas desprotegidas aquí
Route::get('/', function () {return view('home');});
Route::get('login',[LoginController::class,'show']);
Route::post('login',[LoginController::class,'login']);
Route::get('logout',[LoginController::class,'logout']); 


// Rutas protegidas aquí
Route::middleware(['auth'])->group(function () {
    
    Route::post('save_cotizacion',[CotizacionController::class,'guardar']);
    #crud usuarios
    Route::resource('usuarios',UsuarioController::class);
    #crud productos
    Route::resource('productos',ProductoController::class);
    #crud cotizaciones
    Route::resource('cotizaciones',CotizacionController::class);
});




