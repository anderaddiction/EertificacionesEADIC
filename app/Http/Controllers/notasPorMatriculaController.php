<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\DatosPorMatricula;
use App\Master;
use App\notasPorMatricula;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class notasPorMatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        return view('auth.notasPorMatricula.buscar');
    }

    public function resultados(Request $request)
    {
        $dni = $request->input('dni');

        $datos = DatosPorMatricula::where('documento_de_identidad', $dni)->get();

        if ($datos->isEmpty()) {

            return redirect()->route('notas-de-matricula.buscar')->with('info', 'No se encontró ningún DNI verifique.');
        }
        $alumnoMaster = $datos->first()->id_master;

        $masters = Master::where('master_code', $alumnoMaster)->first();


        return view('auth.notasPorMatricula.resultados', compact('datos', 'masters'));
    }

    public function buscarCertificado()
    {
        return view('auth.notasPorMatricula.buscarCertificado');
    }

    public function resultadoCertificado(Request $request)
    {
        $dni = $request->input('dni');

        $datos = DatosPorMatricula::where('documento_de_identidad', $dni)->first();

        if (!$datos) {
            return redirect()->route('notas-de-matricula.buscarCertificado')->with('info', 'No se encontró ningún DNI, verifique.');
        }

        $alumnoMaster = $datos->id_master;

        $masters = Master::where('master_code', $alumnoMaster)->first();
        $notas = NotasPorMatricula::where('id_datos_por_matricula', $datos->id)->get();

        return view('auth.notasPorMatricula.resultadoCertificado', compact('datos', 'masters', 'notas'));
    }


    public function pdfCertificado(Request $request, $id)
    {
        $datosDeMatricula = DatosPorMatricula::findOrFail($id);
        $master = $datosDeMatricula->master;

        $asignaturasIds = $master->asignaturas->pluck('id');
        $asignaturas = Asignatura::whereIn('id', $asignaturasIds)->get();
        $notas = NotasPorMatricula::where('id_datos_por_matricula', $datosDeMatricula->id)->get();
        $pdf = \PDF::loadView('auth.notasPorMatricula.pdf', compact('datosDeMatricula', 'asignaturas', 'master', 'notas'));

        $datosDeMatricula->nombre . $datosDeMatricula->documento_de_identidad;
        return $pdf->stream();
    }

    public function index()
    {

        $datosPorMatriculas = DatosPorMatricula::paginate(DatosPorMatricula::count());
        return view('auth.notasPorMatricula.index', ['datosPorMatriculas' => $datosPorMatriculas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create(Request $request, $id)
    {
        $datosDeMatricula = DatosPorMatricula::findOrFail($id);
        $master = $datosDeMatricula->master;

        $asignaturasIds = $master->asignaturas->pluck('id');
        $asignaturas = Asignatura::whereIn('id', $asignaturasIds)->get();

        return view('auth.notasPorMatricula.create', compact('datosDeMatricula', 'asignaturas'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_datos_por_matricula' => 'required',

            'bloqueado' => 'required',
        ]);
        $notasPorMatricula = new notasPorMatricula();

        $notasPorMatricula->id_datos_por_matricula = $request->id_datos_por_matricula;

        $notasPorMatricula->asignaturas_1 = $request->asignatura_1;
        $notasPorMatricula->modulos_1 = $request->modulo_1;
        $notasPorMatricula->estado_1 = $request->estado_1;
        $notasPorMatricula->baremos_1 = $request->baremo_1;

        $notasPorMatricula->asignaturas_2 = $request->asignatura_2;
        $notasPorMatricula->modulos_2 = $request->modulo_2;
        $notasPorMatricula->estado_2 = $request->estado_2;
        $notasPorMatricula->baremos_2 = $request->baremo_2;

        $notasPorMatricula->asignaturas_3 = $request->asignatura_3;
        $notasPorMatricula->modulos_3 = $request->modulo_3;
        $notasPorMatricula->estado_3 = $request->estado_3;
        $notasPorMatricula->baremos_3 = $request->baremo_3;

        $notasPorMatricula->asignaturas_4 = $request->asignatura_4;
        $notasPorMatricula->modulos_4 = $request->modulo_4;
        $notasPorMatricula->estado_4 = $request->estado_4;
        $notasPorMatricula->baremos_4 = $request->baremo_4;

        $notasPorMatricula->asignaturas_5 = $request->asignatura_5;
        $notasPorMatricula->modulos_5 = $request->modulo_5;
        $notasPorMatricula->estado_5 = $request->estado_5;
        $notasPorMatricula->baremos_5 = $request->baremo_5;

        $notasPorMatricula->asignaturas_6 = $request->asignatura_6;
        $notasPorMatricula->modulos_6 = $request->modulo_6;
        $notasPorMatricula->estado_6 = $request->estado_6;
        $notasPorMatricula->baremos_6 = $request->baremo_6;

        $notasPorMatricula->asignaturas_7 = $request->asignatura_7;
        $notasPorMatricula->modulos_7 = $request->modulo_7;
        $notasPorMatricula->estado_7 = $request->estado_7;
        $notasPorMatricula->baremos_7 = $request->baremo_7;

        $notasPorMatricula->asignaturas_8 = $request->asignatura_8;
        $notasPorMatricula->modulos_8 = $request->modulo_8;
        $notasPorMatricula->estado_8 = $request->estado_8;
        $notasPorMatricula->baremos_8 = $request->baremo_8;

        $notasPorMatricula->asignaturas_9 = $request->asignatura_9;
        $notasPorMatricula->modulos_9 = $request->modulo_9;
        $notasPorMatricula->estado_9 = $request->estado_9;
        $notasPorMatricula->baremos_9 = $request->baremo_9;

        $notasPorMatricula->bloqueado = $request->bloqueado;

        $notasPorMatricula->save();

        return redirect()->route('notas-de-matricula.buscar',)->with('info', 'Notas cargadas exitosamente.');
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
        $master = $datosDeMatricula->master;

        $asignaturasIds = $master->asignaturas->pluck('id');
        $asignatura = Asignatura::whereIn('id', $asignaturasIds)->get();

        $notas = NotasPorMatricula::where('id_datos_por_matricula', $datosDeMatricula->id)->get();
        return view(
            'auth.notasPorMatricula.show',
            [
                'notas' => $notas,
                'asignatura' => $asignatura,
                'datosDeMatricula' => $datosDeMatricula,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosDeMatricula = DatosPorMatricula::findOrFail($id);
        $master = $datosDeMatricula->master;

        $asignaturasIds = $master->asignaturas->pluck('id');
        $asignatura = Asignatura::whereIn('id', $asignaturasIds)->get();

        $notas = NotasPorMatricula::where('id_datos_por_matricula', $datosDeMatricula->id)->get();

        return view(
            'auth.notasPorMatricula.edit',
            [
                'notas' => $notas,
                'asignatura' => $asignatura,
                'datosDeMatricula' => $datosDeMatricula,
            ]
        );
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

        $request->validate([
            'id' => 'required',
            'bloqueado' => 'required',
        ]);
        $notasPorMatricula_id = $request->id;
        $notasPorMatricula = NotasPorMatricula::findOrFail($notasPorMatricula_id);

        for ($i = 1; $i <= 9; $i++) {
            $notasPorMatricula["asignaturas_$i"] = $request->input("asignaturas_$i");
            $notasPorMatricula["modulos_$i"] = $request->input("modulos_$i");
            $notasPorMatricula["estado_$i"] = $request->input("estado_$i");
            $notasPorMatricula["baremos_$i"] = $request->input("baremos_$i");
        }


        $notasPorMatricula->bloqueado = $request->input('bloqueado');

        $notasPorMatricula->save();

        return redirect()->route('notas-de-matricula.buscar')
            ->with('info', 'Notas actualizadas exitosamente.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('notas-de-matricula.resultados');
    }
}
