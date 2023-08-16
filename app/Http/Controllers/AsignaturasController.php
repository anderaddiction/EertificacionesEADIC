<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Master;
use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipoAsignaturas = $request->get('tipo_asignaturas');

        if ($tipoAsignaturas == 'sin_masters') {
            $asignaturas = Asignatura::whereDoesntHave('masters')->paginate(20);
        } elseif ($tipoAsignaturas == 'con_masters') {
            $asignaturas = Asignatura::has('masters')->paginate(20);
        } else {
            $asignaturas = Asignatura::paginate(20);
        }

        return view('auth.asignatura.index', compact('asignaturas', 'tipoAsignaturas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $masters = Master::all();
        $tipoAsignaturas = $request->get('tipo_asignaturas');

        if ($tipoAsignaturas == 'sin_masters') {
            $asignaturas = Asignatura::whereDoesntHave('masters')->paginate(20);
        } elseif ($tipoAsignaturas == 'con_masters') {
            $asignaturas = Asignatura::has('masters')->paginate(20);
        } else {
            $asignaturas = Asignatura::paginate(20);
        }

        return view('auth.asignatura.create', compact('masters', 'asignaturas', 'tipoAsignaturas'));
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
            //'master' => ['required'],
            'code' => ['required'],
            'numero_de_la_asignatura' => ['required'],
            'nombre' => ['required'],
            'creditos' => ['required'],
        ], [
            //'master' => 'Debe seleccionar el master al cual pertnece la asignatura.',
            'code' => 'El campo codigo es obligatorio',
            'numero_de_la_asignatura' => 'Las numero de la asignatura es obligatoria.',
            'nombre' => 'El nombre de la asignatura es obligatoria.',
            'creditos' => 'Los creditos de la asignatura es obligatoria.',
        ]);
        $master
            = $request->master;
        $asignatura = new Asignatura();
        $asignatura->code = $request->code;
        $asignatura->numero_de_la_asignatura = $request->numero_de_la_asignatura;
        $asignatura->nombre = $request->nombre;
        $asignatura->creditos = $request->creditos;
        $asignatura->slug = app(Asignatura::class)->generateUrl($request->nombre);

        $asignatura->save();
        /* descomentar si se desea que al momento de crear una asignatura se guarde la relacion con la tabla masters*/
        //$asignaturaId = $asignatura->id;
        //$masterId = $master;
        //$master = Master::find($masterId);
        //$asignatura = Asignatura::find($asignaturaId);
        /* Guardar datos en una tabla relacion muchos a muchos */
        //$master->asignaturas()->attach($asignatura->id);


        return redirect()->route("asignatura.index")->with(["info" => "¡Se agrego con exito la asignatura.!",]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura = Asignatura::with('masters')->findOrFail($id);

        return view('auth.asignatura.show', compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masters = Master::all();
        $asignatura = Asignatura::findOrFail($id);
        return view('auth.asignatura.edit', compact('masters', 'asignatura'));
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
            //'master' => ['required'],
            'code' => ['required'],
            'numero_de_la_asignatura' => ['required'],
            'nombre' => ['required'],
            'creditos' => ['required'],
        ], [
            'master' => 'Debe seleccionar el master al cual pertnece la asignatura.',
            'code' => 'El campo codigo es obligatorio',
            'numero_de_la_asignatura' => 'Las numero de la asignatura es obligatoria.',
            'nombre' => 'El nombre de la asignatura es obligatoria.',
            'creditos' => 'Los creditos de la asignatura es obligatoria.',
        ]);

        $masterId = $request->master;
        $asignatura = Asignatura::findOrFail($id);

        $asignatura->code = $request->code;
        $asignatura->numero_de_la_asignatura = $request->numero_de_la_asignatura;
        $asignatura->nombre = $request->nombre;
        $asignatura->creditos = $request->creditos;
        $asignatura->slug = app(Asignatura::class)->generateUrl($request->nombre);

        $asignatura->save();
        /*guardar en la tabla masters asignatura */
        //$master = Master::find($masterId);
        /* Actualizar datos en una tabla relacion muchos a muchos */
        // $asignatura->masters()->sync([$master->id]);

        $masterId = $request->master;
        if ($masterId) {
            $master = Master::find($masterId);
            $asignatura->masters()->sync([$master->id]);
        }


        return redirect()->route("asignatura.index")->with(["info" => "¡Se actualizó con éxito la asignatura y su relación con el master!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignatura = Asignatura::findOrFail($id);

        // Eliminar la relación con los masters
        $asignatura->masters()->detach();

        // Eliminar la asignatura
        $asignatura->delete();


        return redirect()->route("asignatura.index")->with(["info" => "¡Se eliminó con éxito la asignatura y su relación con el master!"]);
    }
}
