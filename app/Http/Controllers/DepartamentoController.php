<?php

namespace App\Http\Controllers;

use App\departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = departamento::orderBy('id', 'ASC')->paginate(departamento::count());
        return view('auth.departamento.index', [
            'departamentos' => $departamentos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.departamento.create');
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
            'codigo' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Crear un nuevo departamento
        $departamento = new Departamento;
        $departamento->name = $validatedData['name'];
        $departamento->codigo = $validatedData['codigo'];
        $departamento->status = $validatedData['status'];
        $departamento->save();

        $departamentos = departamento::orderBy('id', 'ASC')->paginate(departamento::count());
        return redirect()->route('departamento.index')->with('info', 'Departamento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = departamento::findOrFail($id);
        return view(
            'auth.departamento.show',
            [
                'departamento' => $departamento,

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = departamento::findOrFail($id);
        return view(
            'auth.departamento.edit',
            [
                'departamento' => $departamento,

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, departamento $departamento)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Buscar el departamento a actualizar
        $departamento = Departamento::findOrFail($request->id);

        // Actualizar los campos
        $departamento->name = $validatedData['name'];
        $departamento->codigo = $validatedData['codigo'];
        $departamento->status = $validatedData['status'];
        $departamento->save();

        // Redirigir a la página de detalles o a donde desees después de actualizar
        return redirect()->route('departamento.index')->with('info', 'Departamento editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);

        $departamento->delete();
        return redirect()->route('departamento.index')->with('info', 'Departamento eliminado exitosamente.');
    }
}
