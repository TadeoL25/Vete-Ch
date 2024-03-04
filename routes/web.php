<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

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

Route::get('inicioURL',[adminController::class, 'iniciofuncion'])->name('inicioruta');
Route::get('perrosURL',[adminController::class, 'perrosfuncion'])->name('perrosruta');
Route::post('nuevapersona',[adminController::class, 'nuevaPersona'])->name('persona.nuevo');
Route::get('eliminarpersona/{id}',[adminController::class, 'eliminarPersona'])->name('persona.eliminar');
Route::post('editarpersona/{id}',[adminController::class, 'editarPersona'])->name('persona.editar');

//Perros
Route::post('perros',[adminController::class, 'nuevoPerro'])->name('perro.nuevo');
Route::get('eliminarperro/{id}',[adminController::class, 'eliminarPerro'])->name('perro.eliminar');
Route::post('editarperro/{id}',[adminController::class, 'editarPerro'])->name('perro.editar');