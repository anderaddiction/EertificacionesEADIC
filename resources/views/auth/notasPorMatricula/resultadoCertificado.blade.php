@extends('adminlte::page')

@section('title', 'Gestion de matricula')

@section('content_header')
    <h1>Matricula</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info p-2">
                    <div class="card-body">
                        <h5 class="card-title">Resultado de la matricula</h5>
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
                                @if ($datos)
                                    <tr>
                                        <td>{{ $datos->id }}</td>
                                        <td>{{ $datos->nombre }}</td>
                                        <td>{{ $datos->documento_de_identidad }}</td>
                                        <td>
                                            @if ($masters)
                                                {{ $masters->master_code }}
                                            @else
                                                No se encontró información del master.
                                            @endif
                                        </td>
                                        <td>
                                            @if ($datos->university)
                                                @if ($datos->university->name == 'UDIMA')
                                                    <img src="img/udima_log.png" alt="logo UDIMA">
                                                @elseif ($datos->university->name == 'UCAM')
                                                    <img src="img/ucam_logo.png" alt="logo UCAM">
                                                @else
                                                    {{ $datos->university->name }}
                                                @endif
                                            @else
                                                No hay información de universidad disponible
                                            @endif
                                        </td>
                                        <td>{{ $datos->email }}</td>
                                        <td>{{ $datos->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                @if ($notas->isEmpty())
                                                    <!-- No se encontraron registros, mostrar el botón "Cargar notas" -->
                                                    <a href="{{ route('notas-de-matricula.create', $datos->id) }}"
                                                        class="btn btn-primary mx-2">Cargar notas</a>
                                                @else
                                                    @foreach ($notas as $nota)
                                                        @if ($nota->bloqueado == 1)
                                                            <a href="{{ route('notas-de-matricula.show', $datos) }}"
                                                                class="btn btn-secondary">Ver</a>
                                                            <a href="{{ route('notas-de-matricula.pdf.certificados', $datos) }}"
                                                                class="btn btn-secondary">Certificado</a>
                                                        @else
                                                            <a href="{{ route('notas-de-matricula.edit', $datos->id) }}"
                                                                class="btn btn-success mx-2">Editar notas</a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="8">No se encontraron datos para mostrar.</td>
                                    </tr>
                                @endif
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
