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
