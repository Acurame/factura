<?php

use App\Http\Livewire\Cliente;
use App\Http\Livewire\Empleados;
use App\Http\Livewire\Factura;
use App\Http\Livewire\Productos;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/cliente', Cliente::class)->name('cliente');
    Route::get('/productos', Productos::class)->name('productos');
    Route::get('/empleado', Empleados::class)->name('empleado');
    Route::get('/factura', Factura::class)->name('factura');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
