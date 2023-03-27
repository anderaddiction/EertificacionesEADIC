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
            return redirect()->back()->with('alert', 'El email ingresado no coincide con nuestros registros');
        }
    }
}
