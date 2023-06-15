<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaTelefonicaRequest;
use App\Http\Requests\OficinaVirtualRequest;
use App\Mail\OsticketNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $osticket = Mail::to('apoyomaster@eadic.es')->send(new OsticketNotification($request));
        return view('oficina-vitual.cita-telefonica');
    }

    public function zoomMeet(Type $var = null)
    {
        return view('oficina-vitual.zoom-meet');
    }
}
