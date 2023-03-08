<?php

namespace App\Http\Controllers\Tramites;

use App\Http\Controllers\Controller;
use App\Http\Requests\TramiteDiplomaRequest;
use App\TramiteDiploma;
use App\University;
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
        $results = TramiteDiploma::with('category', 'diploma_state', 'university', 'master')->where('ticket_diplomaynota', $ticket)->get();
        //$results = DB::table("tramite_diplomas")->where("ticket_diplomaynota", $ticket)->get();

        return view('tramites.certificados.results', [
            'results' => $results
        ]);
    }
}
