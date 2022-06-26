<?php

use Illuminate\Support\Facades\Route;

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
    return view('app');
});
Route::post('/loginVue', [App\Http\Controllers\LoginController::class, 'login']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ingredientes', [App\Http\Controllers\IngredienteController::class, 'index']);
Route::get('/ingredientes/create', [App\Http\Controllers\IngredienteController::class, 'create']);
Route::post('/ingredientes/insert', [App\Http\Controllers\IngredienteController::class, 'insert']);
Route::get('/ingredientes/{id}/edit', [App\Http\Controllers\IngredienteController::class, 'edit']);
Route::post('/ingredientes/update/{id}', [App\Http\Controllers\IngredienteController::class, 'update']);
Route::post('/ingredientes/delete/{id}', [App\Http\Controllers\IngredienteController::class, 'delete']);
Route::get('/ingredientes/json', [App\Http\Controllers\IngredienteController::class, 'json']);


Route::get('/busqueda', [App\Http\Controllers\BusquedaController::class, 'index']);

// EXPORT PDF
Route::get('ingredientes/export/', [App\Http\Controllers\IngredienteController::class, 'export']);
Route::get('tipos/export/', [App\Http\Controllers\TipoController::class, 'export']);
Route::get('productos/export/', [App\Http\Controllers\ProductoController::class, 'export']);


Route::get('/tipos/prueba', [App\Http\Controllers\TipoController::class, 'prueba']);
Route::get('/ingredientes/prueba', [App\Http\Controllers\IngredienteController::class, 'prueba']);
Route::get('/tipos', [App\Http\Controllers\TipoController::class, 'index']);
Route::get('/tipos/create', [App\Http\Controllers\TipoController::class, 'create']);
Route::post('/tipos/insert', [App\Http\Controllers\TipoController::class, 'insert']);
//Route::get('/tipos_ingredientes', [App\Http\Controllers\TipoIngredienteController::class, 'index']);
Route::get('/tipos/{id}/agregaringrediente', [App\Http\Controllers\TipoIngredienteController::class, 'agregar']);
Route::post('/tipos/insertingrediente', [App\Http\Controllers\TipoIngredienteController::class, 'guardar']);
Route::post('/tipos/delete/{id}', [App\Http\Controllers\TipoController::class, 'delete']);
Route::post('/tipos_ingrediente/delete/{id}', [App\Http\Controllers\TipoController::class, 'delete_ingrediente']);
Route::get('/tipos/{id}/edit', [App\Http\Controllers\TipoController::class, 'edit']);
Route::post('/tipos/deleteingrediente', [App\Http\Controllers\TipoIngredienteController::class, 'delete']);
Route::post('/tipos/update/{id}', [App\Http\Controllers\TipoController::class, 'update']);
Route::get('/tipos/json', [App\Http\Controllers\TipoController::class, 'json']);
