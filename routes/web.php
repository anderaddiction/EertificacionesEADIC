<?php

use App\AlumnoActivo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosActivosController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\OficinaVirtualController;
use App\Http\Controllers\MatriculaStatusController;
use App\Http\Controllers\Tramites\TramiteDiplomaController;
use Illuminate\Support\Facades\Response;
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

Route::prefix('eadic-auth')->group(function () {
    Route::get('/alumnos-login', 'StudentController@index')->name('alumnos-login');
    Route::post('/alumnos-autenticacion', 'StudentController@auth')->name('alumnos-autenticacion');
});

Route::prefix('suporte')->group(function () {
    Route::get('aulumno', function () {
        return view('soporte.links.index');
    })->name('soporte.alumno');
});

Route::prefix('oficina-virtual')->group(function () {
    Route::get('/oficina-virtual', [OficinaVirtualController::class, 'index'])->name('oficina-virtual');
    Route::get('/zoom-meet', [OficinaVirtualController::class, 'zoomMeet'])->name('zoom-meet');
    Route::get('/solicitud-cita-telefonica', [OficinaVirtualController::class, 'citaTelefonica'])->name('cita-telefonica');
    Route::post('/agendar-cita-telefonica', [OficinaVirtualController::class, 'agendarCita'])->name('agendar-cita-telefonica');
    Route::get('preguntas-frecuentes', function () {
        return view('oficina-vitual.preguntas-frecuentes');
    })->name('preguntas-frecuentes');
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
    Route::post('/certificados/desacargar-certificado', [AlumnosActivosController::class, 'downloadPDF'])->name('certificado.descarga');
});

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:cache');
    $exitCode2 = Artisan::call('cache:clear');
    $exitCode3 = Artisan::call('key:generate');
});

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

    //Asignaturas
    Route::resource('asignatura', AsignaturasController::class);

    //Datos por matricula

    Route::resource('datos-de-matricula', DatosPorMatriculaController::class);

    //CARGAR ARCHIVOS CSV
    Route::post('datos-de-matricula/cargar-csv', [App\Http\Controllers\DatosPorMatriculaController::class, 'cargarCSV'])->name('datos-de-matricula.cargar-csv');

    // Notas por matricula
    // buscar matricula
    Route::get('notas-de-matricula/buscar', [App\Http\Controllers\notasPorMatriculaController::class, 'buscar'])->name('notas-de-matricula.buscar');

    Route::post('notas-de-matricula/resultados', [App\Http\Controllers\notasPorMatriculaController::class, 'resultados'])->name('notas-de-matricula.resultados');
    // fin buscar matricula

    // buscar matricula para certificado
    Route::get('notas-de-matricula/buscar-certificado', [App\Http\Controllers\notasPorMatriculaController::class, 'buscarCertificado'])->name('notas-de-matricula.buscar.certificados');

    Route::post('notas-de-matricula/resultado-certificado', [App\Http\Controllers\notasPorMatriculaController::class, 'resultadoCertificado'])->name('notas-de-matricula.resultado.certificados');
    // fin buscar matricula para certificado

    // PDF notas por matricula
    Route::get('notas-de-matricula/pdf-certificado/{id}', [App\Http\Controllers\notasPorMatriculaController::class, 'pdfCertificado'])->name('notas-de-matricula.pdf.certificados');

    Route::resource('notas-de-matricula', NotasPorMatriculaController::class)->except(['create']);
    Route::get('notas-de-matricula/create/{id}', [App\Http\Controllers\notasPorMatriculaController::class, 'create'])->name('notas-de-matricula.create');

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

    //Reportes
    Route::get('log/cerficados-activos-descargados', [LogController::class, 'certificadoActivoDescargadoLog'])->name('certificado_activo_log');

    Route::prefix('territorios')->group(function () {
        Route::resource('countries', CountryController::class)
            ->parameters(['country' => 'country'])
            ->names('country');
    });
});


Route::get('/descargar-csv', function () {
    $rutaArchivo = public_path('documents/plantilla.csv'); 

    return Response::download($rutaArchivo, 'plantilla.csv');
});
