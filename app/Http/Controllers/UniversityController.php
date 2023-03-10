<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use App\Http\Requests\UniversityRequest;

class UniversityController extends Controller
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
        $universities = University::orderBy('id', 'ASC')->paginate(20);
        return view('auth.universities.index', [
            'universities' => $universities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $university = new University;
        return view('auth.universities.create', [
            'university' => $university
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversityRequest $request)
    {
        University::create(
            $request->validated()
                + ['code' => app(University::class)->getRandomString()]
                + ['slug' => app(University::class)->generateUrl($request->name)]
        );
        return redirect()->back()->with('Success', 'Data stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        return view('auth.universities.show', [
            'university' => $university
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        return view('auth.universities.edit', [
            'university' => $university
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $university
     * @return \Illuminate\Http\Response
     */
    public function update(UniversityRequest $request, University $university)
    {
        $university->update(
            $request->validated()
                + ['slug' => app(University::class)->generateUrl($request->name)]
        );
        return redirect()->route('university.edit', [
            'university' => $university
        ])->with('Success', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        $university->delete();
        $universities = University::orderBy('id', 'ASC')->paginate(20);
        return redirect()->route('university.index', [
            'universities' => $universities
        ])->with('Success', 'Data Deleted Successfully');
    }
}
