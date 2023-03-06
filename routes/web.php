<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tramites\TramiteDiplomaController;

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

// Modulo de Tramites
Route::prefix('tramites')->group(function () {
    Route::get('certificados/seach', [TramiteDiplomaController::class, 'index'])->name('consulta');
    Route::post('certificados', [TramiteDiplomaController::class, 'find'])->name('consulta.find');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    //Roles
    Route::resource('roles', RoleController::class)
        ->parameters(['role' => 'role'])
        ->names('role');

    //Users
    Route::resource('users', UserController::class)
        ->parameters(['user' => 'user'])
        ->names('user');
});
