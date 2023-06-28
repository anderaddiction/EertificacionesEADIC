<?php

namespace App\Http\Controllers;

use App\AlumnoActivo;
use App\TramiteDiploma;
use App\Http\Requests\StudentAuthRequest;

class StudentController extends Controller
{
    public function index()
    {
        return view('auth.students.login');
    }

    public function auth(StudentAuthRequest $request)
    {
        $email = $request->email;
        $result = TramiteDiploma::where('correo', $email)->first();
        $result_activo = AlumnoActivo::where('correo', $email)->first();
        //return $result_activo;

        if ((!empty($result)) || (!empty($result_activo))) {
            return view('home');
        } elseif ((!$result) || (!$result_activo)) {
            return redirect()->back()->with('alert', '
Si después de verificar los puntos anteriores y continúas presentando inconvenientes para acceder a nuestro portal, por
                favor, solicita ayuda a través de la plataforma Soporte EADIC dando clic <a href="http://soporte.eadic.biz/open.php" target="_BLANK"><strong>AQUÍ</strong></a>');
        }
    }
}
