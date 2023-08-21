<?php

namespace App\Http\Controllers;

use App\DatosPorMatricula;
use App\Master;
use App\University;
use Illuminate\Http\Request;

class DatosPorMatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosPorMatriculas = DatosPorMatricula::paginate(20);
        return view('auth.DatosPorMatricula.index',  [
            'datosPorMatriculas' => $datosPorMatriculas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universidades = University::all();
        $masters = Master::all();
        return view('auth.DatosPorMatricula.create', compact('universidades', 'masters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento_de_identidad' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'id_master' => 'required|integer',
            'id_universities' => 'required|integer',
            'situacion_financiera' => 'required|string|max:255',
            'estado_matricula' => 'required|string|max:255',
            'modalidad_de_estudio' => 'required|string|max:255',
            'estado_formacion' => 'required|string|max:255',
            'edicion_master' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'numero_oportunidad' => 'required|integer',
        ]);

        // Crea una nueva instancia del modelo y asigna los valores
        $datosPorMatricula = new DatosPorMatricula();
        $datosPorMatricula->nombre = $request['nombre'];
        $datosPorMatricula->apellido = $request['apellido'];
        $datosPorMatricula->documento_de_identidad = $request['documento_de_identidad'];
        $datosPorMatricula->email = $request['email'];
        $datosPorMatricula->id_master = $request['id_master'];
        $datosPorMatricula->id_universities = $request['id_universities'];
        $datosPorMatricula->situacion_financiera = $request['situacion_financiera'];
        $datosPorMatricula->estado_matricula = $request['estado_matricula'];
        $datosPorMatricula->modalidad_de_estudio = $request['modalidad_de_estudio'];
        $datosPorMatricula->estado_formacion = $request['estado_formacion'];
        $datosPorMatricula->edicion_master = $request['edicion_master'];
        $datosPorMatricula->fecha_inicio = $request['fecha_inicio'];
        $datosPorMatricula->fecha_fin = $request['fecha_fin'];
        $datosPorMatricula->numero_oportunidad = $request['numero_oportunidad'];

        // Guarda el modelo en la base de datos
        $datosPorMatricula->save();

        // Redirige a donde desees después de almacenar los datos
        return redirect()->route('datos-de-matricula.index')->with('info', 'Los Datos de la Matricula se guardaron exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datosDeMatricula = DatosPorMatricula::findOrFail($id);

        return view('auth.DatosPorMatricula.show', compact('datosDeMatricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosPorMatricula = DatosPorMatricula::findOrFail($id);
        $universidades = University::all();
        $masters = Master::all();
        return view('auth.DatosPorMatricula.edit', compact('datosPorMatricula', 'masters', 'universidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosPorMatricula = DatosPorMatricula::findOrFail($id);

        $datosPorMatricula->update([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'documento_de_identidad' => $request->input('documento_de_identidad'),
            'email' => $request->input('email'),
            'id_master' => $request->input('id_master'),
            'id_universities' => $request->input('id_universities'),
            'situacion_financiera' => $request->input('situacion_financiera'),
            'estado_matricula' => $request->input('estado_matricula'),
            'modalidad_de_estudio' => $request->input('modalidad_de_estudio'),
            'estado_formacion' => $request->input('estado_formacion'),
            'edicion_master' => $request->input('edicion_master'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
            'numero_oportunidad' => $request->input('numero_oportunidad'),
            // Agrega aquí los demás campos que desees actualizar
        ]);

        return redirect()->route('datos-de-matricula.index', $id)
            ->with('info', 'Los datos de la matrícula han sido actualizados exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datosPorMatricula = DatosPorMatricula::findOrFail($id);

        // Eliminar la matricula
        $datosPorMatricula->delete();

        return redirect()->route("datos-de-matricula.index")->with(["info" => "¡Los datos de la matrícula ha sido eliminada exitosamente.!"]);
    }
}
