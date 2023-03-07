<?php

namespace App\Http\Controllers;

use App\Concept;
use App\DiplomaState;
use Illuminate\Http\Request;
use App\Http\Requests\DiplomaStateRequest;

class DiplomaStateController extends Controller
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
        $diplomas = DiplomaState::orderBy('id', 'ASC')->paginate(20);
        return view('auth.diploma_state.index', [
            'diplomas' => $diplomas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diploma_status = new DiplomaState();
        $concepts = Concept::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('auth.diploma_state.create', [
            'diploma_status' => $diploma_status,
            'concepts' => $concepts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiplomaStateRequest $request)
    {
        DiplomaState::create(
            $request->validated()
                + ['code' => getRandomString()]
                + ['slug' => generateUrl($request->name)]
        );
        return redirect()->back()->with('Success', 'Data stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $diploma_status
     * @return \Illuminate\Http\Response
     */
    public function show(DiplomaState $diploma_status)
    {

        return view('auth.diploma_state.show', [
            'diploma' => $diploma_status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $diploma_status
     * @return \Illuminate\Http\Response
     */
    public function edit(DiplomaState $diploma_status)
    {
        $concepts = Concept::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('auth.diploma_state.edit', [
            'diploma_status' => $diploma_status,
            'concepts' => $concepts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $diploma_status
     * @return \Illuminate\Http\Response
     */
    public function update(DiplomaStateRequest $request, DiplomaState $diploma_status)
    {
        $diploma_status->update(
            $request->validated()
                + ['slug' => generateUrl($request->name)]
        );
        return redirect()->route('diploma_state.edit', [
            'diploma_status' => $diploma_status
        ])->with('Success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $diploma_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiplomaState $diploma_status)
    {
        $diploma_status->delete();
        $diplomas = DiplomaState::orderBy('id', 'ASC')->paginate(20);
        return redirect()->route('diploma_state.index', [
            'diplomas' => $diplomas
        ])->with('Success', 'Data Deleted Successfully');
    }
}
