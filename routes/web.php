<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesionalesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruta Dashboard
//Route::get('profesionales/index', 'ProfesionalesController@index')->name('profesionales.index');
Route::get('profesionales', [ProfesionalesController::class, 'index'])
    ->name('profesionales.index');
 
// Rutas CRUD
/* Crear */
//Route::get('profesionales/crear', 'ProfesionalesController@crear')->name('profesionales.crear');
Route::get('profesionales/crear', [ProfesionalesController::class, 'crear'])
    ->name('profesionales.crear');

//Route::put('profesionales/store', 'ProfesionalesController@store')->name('profesionales.store');
Route::post('profesionales', [ProfesionalesController::class, 'store'])
    ->name('profesionales.store');
 
/* Leer */
 
/* Actualizar */
//Route::get('profesionales/actualizar/{id}', 'ProfesionalesController@actualizar')->name('profesionales.actualizar');
Route::get('profesionales/actualizar/{id}', [ProfesionalesController::class, 'actualizar'])
    ->name('profesionales.actualizar');

//Route::put('profesionales/update/{id}', 'ProfesionalesController@update')->name('profesionales.update');
Route::put('profesionales/update/{id}', [ProfesionalesController::class, 'update'])
    ->name('profesionales.update');
 
/* Eliminar */
//Route::put('profesionales/eliminar/{id}', 'ProfesionalesController@eliminar')->name('profesionales.eliminar');
Route::get('profesionales/eliminar/{id}', [ProfesionalesController::class, 'eliminar'])
    ->name('profesionales.eliminar');

