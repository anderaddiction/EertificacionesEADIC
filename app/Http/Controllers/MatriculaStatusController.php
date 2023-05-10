<?php

namespace App\Http\Controllers;

use App\TramiteDiploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MatriculaStatusResquest;

class MatriculaStatusController extends Controller
{
    public function index(Type $var = null)
    {
        return view('tramites.matriculas.index');
    }


    public function find(MatriculaStatusResquest $request)
    {
        $dni = $request->user_dni;
        $results = TramiteDiploma::with('category', 'diploma_state', 'university', 'master')->where('dni', $dni)->get();
        $dni_result = DB::table('tramite_diplomas')->select("dni")->where('dni', $dni)->first();


        if (empty($dni_result)) {
            return view('tramites.matriculas.results', [
                'results' => $results,
                'dni_result' => $dni_result,
                'dni' => $dni
            ]);
        } else {
            return view('tramites.matriculas.results', [
                'results' => $results,
                'dni_result' => $dni_result,
            ]);
        }
    }
}
