<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 
Route::get('/home', [HomeController::class, 'index']);

Route::get('pruebas/index',[HolaController::class,'index']); 

Route::get('clientes/index',[ClienteController::class,'index'])->name('index');  
Route::get('clientes/formulario',[ClienteController::class,'formulario'])->name('nuevo');  
Route::post('/crear', [ClienteController::class, 'crear'])->name('crear');
Route::get('/eliminar/{id}',[ClienteController::class,'eliminar'])->name('eliminar');

Route::get('/editar/{id}',[ClienteController::class,'editar'])->name('editar');
Route::post('/actualizar/{id}',[ClienteController::class,'actualizar'])->name('actualizar');
Route::get('/ver/{id}',[ClienteController::class,'ver'])->name('ver');

Route::get('/clientes/buscar',[ClienteController::class,'buscar'])->name('buscar');
