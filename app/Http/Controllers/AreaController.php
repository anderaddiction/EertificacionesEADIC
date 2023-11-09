<?php

namespace App\Http\Controllers;

use App\area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = area::orderBy('id', 'ASC')->paginate(area::count());
        return view('auth.area.index', [
            'areas' => $areas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $area = new area;
        $area->name = $validatedData['name'];
        $area->save();
        return redirect()->route('area.index')->with('info', 'Área creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = area::findOrFail($id);
        return view(
            'auth.area.show',
            [
                'area' => $area,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = area::findOrFail($id);
        return view(
            'auth.area.edit',
            [
                'area' => $area,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Buscar el area a actualizar
        $area = area::findOrFail($request->id);

        // Actualizar los campos
        $area->name = $validatedData['name'];
        $area->save();

        return redirect()->route('area.index')->with('info', 'Área editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = area::findOrFail($id);

        $area->delete();
        return redirect()->route('area.index')->with('info', 'Área eliminado exitosamente.');
    }
}
