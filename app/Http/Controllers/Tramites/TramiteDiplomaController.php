<?php

namespace App\Http\Controllers\Tramites;

use App\TramiteDiploma;
use App\Http\Controllers\Controller;
use App\Http\Requests\TramiteDiplomaRequest;
use Illuminate\Support\Facades\DB;

class TramiteDiplomaController extends Controller
{
    public function index()
    {
        return view('tramites.certificados.index');
    }

    public function find(TramiteDiplomaRequest $request)
    {

        $ticket = $request->ticket_diplomaynotas;
        $results = DB::table("tramite_diplomas")->where("TICKET_DIPLOMAYNOTAS", $ticket)->get();
        return view('tramites.certificados.results', [
            'results' => $results
        ]);
    }
}
