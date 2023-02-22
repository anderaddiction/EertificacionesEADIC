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
    return view('welcome');
});

Route::prefix('suporte')->group(function () {
    Route::get('aulumno', function () {
        return view('soporte.links.index');
    })
        ->name('soporte.alumno');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
