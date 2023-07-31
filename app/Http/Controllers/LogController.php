<?php

namespace App\Http\Controllers;

use App\CerficadoActivoLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function certificadoActivoDescargadoLog()
    {
        $cert_activ_descargados = CerficadoActivoLog::orderBy('created_at', 'DESC')->get();
        return view('auth/logs.certificados_activos_descargados.index', [
            'cert_activ_descargados' => $cert_activ_descargados
        ]);
    }
}
