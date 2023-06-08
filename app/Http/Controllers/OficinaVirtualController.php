<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaTelefonicaRequest;
use App\Http\Requests\OficinaVirtualRequest;
use Illuminate\Http\Request;

class OficinaVirtualController extends Controller
{
    public function index(Type $var = null)
    {
        return view('oficina-vitual.index');
    }

    public function citaTelefonica(Type $var = null)
    {
        return view('oficina-vitual.cita-telefonica');
    }

    public function agendarCita(CitaTelefonicaRequest $request)
    {
        return $request;
    }

    public function zoomMeet(Type $var = null)
    {
        return view('oficina-vitual.zoom-meet');
    }
}
