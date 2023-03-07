<?php

namespace App\Http\Controllers;

use App\Concept;
use Illuminate\Http\Request;
use App\Http\Requests\ConceptRequest;

class ConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concepts = Concept::orderBy('id', 'ASC')->paginate(20);
        return view('auth.concepts.index', [
            'concepts' => $concepts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $concept = new Concept;
        return view('auth.concepts.create', [
            'concept' => $concept
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConceptRequest $request)
    {
        Concept::create(
            $request->validated()
                + ['code' => getRandomString()]
                + ['slug' => generateUrl($request->name)]
        );
        return redirect()->back()->with('Success', 'Data stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $concept
     * @return \Illuminate\Http\Response
     */
    public function show(Concept $concept)
    {
        return view('auth.concepts.show', [
            'concept' => $concept
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $concept
     * @return \Illuminate\Http\Response
     */
    public function edit(Concept $concept)
    {
        return view('auth.concepts.edit', [
            'concept' => $concept
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $concept
     * @return \Illuminate\Http\Response
     */
    public function update(ConceptRequest $request, Concept $concept)
    {
        $concept->update(
            $request->validated()
                + ['slug' => generateUrl($request->name)]
        );
        return redirect()->route('concept.edit', [
            'concept' => $concept
        ])->with('Success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $concept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concept $concept)
    {
        $concept->delete();
        $concepts = Concept::orderBy('id', 'ASC')->paginate(20);
        return redirect()->route('concept.index', [
            'concepts' => $concepts
        ])->with('Success', 'Data Deleted Successfully');
    }
}
