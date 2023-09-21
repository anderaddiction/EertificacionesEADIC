@extends('adminlte::page')

@section('title', 'Gestion de matricula')

@section('content_header')
    <h1>Matricula </h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info p-2">
                    <div class="card-body">
                        <h5 class="card-title"> Resultado de la matricula</h5>
                        <br>
                        <table id="example2" class="table table-bordered table-hover dt-responsive nowrap">
                            <thead class="text-center thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Alumno</th>
                                    <th>DNI</th>
                                    <th>Master</th>
                                    <th>Universidad</th>
                                    <th>Email</th>
                                    <th>Última actualización</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($datos as $dato)
                                    <tr>
                                        <td>{{ $dato->id }}</td>
                                        <td>{{ $dato->nombre }}</td>
                                        <td>{{ $dato->documento_de_identidad }}</td>
                                        <td>{{ $dato->master->master_code }}</td>
                                        <td>{{ $dato->university->name }}</td>
                                        <td>{{ $dato->email }}</td>
                                        <td>{{ $dato->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="btn-group" role="group">

                                                <?php
                                                $alumno = $dato->id;
                                                $datosDeMatriculas = DB::table('notas_por_matricula')
                                                    ->where('id_datos_por_matricula', $alumno)
                                                    ->get();
                                                ?>

                                                @if ($datosDeMatriculas->isEmpty())
                                                    <!-- No se encontraron registros, mostrar el botón "Cargar notas" -->
                                                    <a href="{{ route('notas-de-matricula.create', $dato->id) }}"
                                                        class="btn btn-primary mx-2">Cargar notas</a>
                                                @else
                                                    @foreach ($datosDeMatriculas as $datosDeMatricula)
                                                        @if ($datosDeMatricula->bloqueado == 1)
                                                            <a href="{{ route('notas-de-matricula.show', $dato) }}"
                                                                class="btn btn-secondary">Ver</a>
                                                            <a href="{{ route('notas-de-matricula.pdf.certificados', $dato) }}"
                                                                class="btn btn-secondary">Certificado</a>
                                                        @else
                                                            <a href="{{ route('notas-de-matricula.edit', $dato->id) }}"
                                                                class="btn btn-success mx-2">Editar notas</a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop


<td><img src="img/eadic-isotipo.png" alt="logo"></td>
<td>
    @if ($datosDeMatricula->university)
        @if ($datosDeMatricula->university->name == 'UDIMA')
            <img src="img/udima_log.png" alt="logo {{ $datosDeMatricula->university->name }}">
        @elseif ($datosDeMatricula->university->name == 'UCAM')
            <img src="img/ucam_logo.png" alt="logo {{ $datosDeMatricula->university->name }}">
        @else
            {{ $datosDeMatricula->university->name }}
        @endif
    @else
        No hay universidad disponible
    @endif
</td>
