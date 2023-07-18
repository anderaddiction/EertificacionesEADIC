<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
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
        $countries = Country::orderBy('name', 'ASC')->get();
        return view('auth.territories.countries.index', [
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = new Country();
        return view('auth.territories.countries.create', [
            'country' => $country
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        Country::create(
            $request->validated()
                + ['slug' => Str::slug($request->name)]
        );
        return redirect()->back()->with('success', 'Data creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('auth.territories.countries.show', [
            'country' => $country
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('auth.territories.countries.edit', [
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->validated()
            + ['slug' => Str::slug($request->name)]);
        return redirect()->back()->with('success', 'Data actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->back()->with('success', 'Data eliminada exitosamente');
    }
}
