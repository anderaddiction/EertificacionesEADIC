<?php

namespace App\Http\Controllers;

use App\Concept;
use App\DiplomaState;
use App\CertificateState;
use Illuminate\Http\Request;
use App\Http\Requests\CertificateStateRequest;

class CertificateStateController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = CertificateState::orderBy('id', 'ASC')->paginate(20);
        return view('auth.certificate_state.index', [
            'certificates' => $certificates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificate_status = new CertificateState();
        $concepts = Concept::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('auth.certificate_state.create', [
            'certificate_status' => $certificate_status,
            'concepts' => $concepts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificateStateRequest $request)
    {
        CertificateState::create(
            $request->validated()
                + ['code' => app(CertificateState::class)->getRandomString()]
                + ['slug' => app(CertificateState::class)->generateUrl($request->name)]
        );
        return redirect()->back()->with('Success', 'Data stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $certificate_status
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateState $certificate_status)
    {
        $concepts = Concept::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('auth.certificate_state.show', [
            'certificate_status' => $certificate_status,
            'concepts' => $concepts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $certificate_status
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateState $certificate_status)
    {
        $concepts = Concept::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('auth.certificate_state.edit', [
            'certificate_status' => $certificate_status,
            'concepts' => $concepts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $certificate_status
     * @return \Illuminate\Http\Response
     */
    public function update(CertificateStateRequest $request, CertificateState $certificate_status)
    {
        $certificate_status->update(
            $request->validated()
                + ['slug' => app(CertificateState::class)->generateUrl($request->name)]
        );
        return redirect()->route('certificate_status.edit', [
            'certificate_status' => $certificate_status
        ])->with('Success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $certificate_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateState $certificate_status)
    {
        $certificate_status->delete();
        $certificates = CertificateState::orderBy('id', 'ASC')->paginate(20);
        return redirect()->route('certificate_status.index', [
            'certificates' => $certificates
        ])->with('Success', 'Data Deleted Successfully');
    }
}
