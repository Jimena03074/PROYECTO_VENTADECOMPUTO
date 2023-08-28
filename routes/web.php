<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompraController;
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

Route::get('infoprod',[CompraController::class,'informacion_producto'])->name('infoprod');
Route::get('comboprod',[CompraController::class,'combo_producto'])->name('comboprod');
Route::get('agregalista',[CompraController::class,'agrega_lista'])->name('agregalista');
Route::get('quitalista',[CompraController::class,'quita_lista'])->name('quitalista');
Route::get('reporteVentas',[CompraController::class,'reporteVentas'])->name('reporteVentas');
Route::get('infocli',[CompraController::class,'informacion_cliente'])->name('infocli');
Route::get('infoven',[CompraController::class,'informacion_vendedor'])->name('infoven');
Route::get('infoven2',[CompraController::class,'informacion_vendedor2'])->name('infoven2');
Route::get('editarVenta',[CompraController::class,'editarVenta'])->name('editarVenta');
Route::get('eliminarVenta',[CompraController::class,'eliminarVenta'])->name('eliminarVenta');



// inicio
Route::get('inicio',[CompraController::class,'compra'])->name('inicio');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

