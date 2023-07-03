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
    return redirect('home');
})->name('home');



Route::resource('home', 'App\Http\Controllers\Home\HomeController');
Route::get('components', 'App\Http\Controllers\Home\HomeController@Components');
Route::get('Plantilla', 'App\Http\Controllers\Home\HomeController@Plantilla');


Route::get('registro', 'App\Http\Controllers\Login\LoginController@Registro');
Route::post('GuardaUsuario', 'App\Http\Controllers\Login\LoginController@GuardaUsuario');

Route::get('LoginPage', 'App\Http\Controllers\Login\LoginController@LoginPage');
Route::post('Login', 'App\Http\Controllers\Login\LoginController@Login');
Route::get('logout', 'App\Http\Controllers\Login\LoginController@Logout');


/**
 * Direcciones Usuario
 */

 Route::resource('tiendas', 'App\Http\Controllers\Usuario\TiendaController');
 Route::post('EliminarTienda/{id}', 'App\Http\Controllers\Usuario\TiendaController@EliminarTienda');

 Route::resource('productos', 'App\Http\Controllers\Usuario\ProductoController');
 Route::post('EliminarProducto/{id}', 'App\Http\Controllers\Usuario\ProductoController@EliminarProducto');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
