<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MasterRequest;
use App\Master;

class MasterController extends Controller
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
        $masters = Master::orderBy('id', 'ASC')->paginate(Master::count());
        return view('auth.masters.index', [
            'masters' => $masters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = new Master();
        return view('auth.masters.create', [
            'master' => $master
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MasterRequest $request)
    {

         $validatedData = $request->validated();
    $validatedData['code'] =  $request->code;

    Master::create(
        $validatedData
            + ['slug' => app(Master::class)->generateUrl($request->name)]
    );

    return redirect()->back()->with('Success', 'Data stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        return view('auth.masters.show', [
            'master' => $master
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        return view('auth.masters.edit', [
            'master' => $master
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $master
     * @return \Illuminate\Http\Response
     */
    public function update(MasterRequest $request, Master $master)
{
    $validatedData = $request->validated();
    $validatedData['code'] = $request->code;

    $master->update(
        $validatedData
            + ['slug' => app(Master::class)->generateUrl($request->name)]
    );

    return redirect()->route('master.edit', [
        'master' => $master
    ])->with('Success', 'Data updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        $master->delete();
        $masters = Master::orderBy('id', 'ASC')->paginate(20);
        return redirect()->route('master.index', [
            'masters$masters' => $masters
        ])->with('Success', 'Data Deleted Successfully');
    }
}
