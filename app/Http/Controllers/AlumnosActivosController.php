<?php

namespace App\Http\Controllers;

use App\AlumnoActivo;
use App\AlumnosActivos;
use App\CerficadoActivoLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Requests\AlumnosActivosRequest;

class AlumnosActivosController extends Controller
{
    public function index()
    {
        return view('tramites.certificados.certificado-alumno-activo');
    }

    public function find(AlumnosActivosRequest $request)
    {
        $users = AlumnoActivo::where('correo', $request->email)
            ->get();

        //return $user;

        return view('tramites.certificados.certificado_lista', [
            'users' => $users
        ]);
        // if (empty($user)) {
        //     return redirect()->back()->with('error', 'En este momento no identificamos la información brindada, por favor verificar número de DNI o intente más tarde');
        // } else {
        //     $dompdf = App::make("dompdf.wrapper");
        //     $dompdf->loadView("tramites.pdf.certificado_pdf", [
        //         'user' => $user
        //     ]);
        //     return $dompdf->download("certificado_alumno_activo.pdf");
        //     return view('tramites.certificados.certificado-alumno-activo-descrgable', [
        //         'user' => $user
        //     ]);
        // }
    }

    public function downloadPDF(Request $request)
    {
        $user = AlumnoActivo::where('id', $request->id)
            ->first();
        CerficadoActivoLog::create([
            'correo'                => $request->correo,
            'master'                => $request->master,
            'universidad_espanola'  => $request->universidad_espanola
        ]);
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("tramites.pdf.certificado_pdf", [
            'user' => $user
        ]);
        return $dompdf->download($user->oportunidades_nombre_contacto . "_" . "certificado_alumno.pdf");
    }
}
