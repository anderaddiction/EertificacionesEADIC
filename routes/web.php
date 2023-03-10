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

// Route::get('/clear-cache', function () {
//     $exitCode = Artisan::call('config:cache');
//     $exitCode2 = Artisan::call('cache:clear');
//     $exitCode3 = Artisan::call('key:generate');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    //Categories
    Route::resource('categories', CategoryController::class)
        ->parameters(['category' => 'category'])
        ->names('category');

    //Concepts
    Route::resource('concepts', ConceptController::class)
        ->parameters(['concept' => 'concept'])
        ->names('concept');

    //Diploma Status
    Route::resource('diploma-status', DiplomaStateController::class)
        ->parameters(['diploma_state' => 'diploma_state'])
        ->names('diploma_state');

    //Certificate Status
    Route::resource('certificate-status', CertificateStateController::class)
        ->parameters(['certificate_status' => 'certificate_status'])
        ->names('certificate_status');

    //Masters
    Route::resource('masters', MasterController::class)
        ->parameters(['master' => 'master'])
        ->names('master');

    //Roles
    Route::resource('roles', RoleController::class)
        ->parameters(['role' => 'role'])
        ->names('role');

    //University
    Route::resource('universities', UniversityController::class)
        ->parameters(['university' => 'university'])
        ->names('university');

    //Users
    Route::resource('users', UserController::class)
        ->parameters(['user' => 'user'])
        ->names('user');
});
