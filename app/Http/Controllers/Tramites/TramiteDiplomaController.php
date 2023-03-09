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
        $ticket_result = DB::table('tramite_diplomas')->select("ticket_diplomaynota")->where('ticket_diplomaynota', $ticket)->first();

        if (empty($ticket_result)) {
            return redirect()->route('consulta')->with('error', 'En este momento no identificamos la información brindada, por favor verificar número de ticket o intente más tarde');
        } else {
            return view('tramites.certificados.results', [
                'results' => $results
            ]);
        }
    }
}
