<?php

use App\AlumnoActivo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosActivosController;
use App\Http\Controllers\OficinaVirtualController;
use App\Http\Controllers\MatriculaStatusController;
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
    return view('auth.students.login');
});

Route::prefix('eadic-auth')->group(
    function () {
        Route::get('/alumnos-login', 'StudentController@index')->name('alumnos-login');
        Route::post('/alumnos-autenticacion', 'StudentController@auth')->name('alumnos-autenticacion');
    }
);


Route::prefix('suporte')->group(function () {
    Route::get('aulumno', function () {
        return view('soporte.links.index');
    })
        ->name('soporte.alumno');
});

Route::prefix('oficina-virtual')->group(function () {
    Route::get('/oficina-virtual', [OficinaVirtualController::class, 'index'])->name('oficina-virtual');
    Route::get('/zoom-meet', [OficinaVirtualController::class, 'zoomMeet'])->name('zoom-meet');
    Route::get('/solicitud-cita-telefonica', [OficinaVirtualController::class, 'citaTelefonica'])->name('cita-telefonica');
    Route::post('/agendar-cita-telefonica', [OficinaVirtualController::class, 'agendarCita'])->name('agendar-cita-telefonica');
});

// Modulo Estado de Certificaciones
Route::prefix('matriculas')->group(function () {
    Route::get('search', [MatriculaStatusController::class, 'index'])->name('matricula');
    Route::post('matriculacion', [MatriculaStatusController::class, 'find'])->name('matricula.find');
});

// Modulo de Tramites
Route::prefix('tramites')->group(function () {
    Route::get('certificados/seach', [TramiteDiplomaController::class, 'index'])->name('consulta');
    Route::post('certificados', [TramiteDiplomaController::class, 'find'])->name('consulta.find');
    Route::get('/certificados/alumno-activo', [AlumnosActivosController::class, 'index'])->name('certificado.consulta');
    Route::post('/certificados/alumno-activo', [AlumnosActivosController::class, 'find'])->name('certificado.find');
});


// Route::get('/clear-cache', function () {
//     $exitCode = Artisan::call('config:cache');
//     $exitCode2 = Artisan::call('cache:clear');
//     $exitCode3 = Artisan::call('key:generate');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');

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
