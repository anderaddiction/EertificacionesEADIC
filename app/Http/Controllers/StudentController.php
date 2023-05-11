<?php

namespace App\Http\Controllers;

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

        if (!empty($result)) {
            return view('home');
        } elseif (!$result) {
            return redirect()->back()->with('alert', '
Si después de verificar los puntos anteriores y continúas presentando inconvenientes para acceder a nuestro portal, por favor, solicita ayuda a través de la <strong> plataforma Soporte EADIC</strong> con el help topic:  <strong>“Problema de acceso/Portal Secretaría”</strong>');
        }
    }
}
