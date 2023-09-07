@extends('adminlte::page')
@section('title', 'Detalles de notas')

@section('content_header')
    <h3>Detalles de notas</h3>
@stop

@section('content')

    <!-- Información personal del estudiante -->
    <div class="card p-2">
        <div class="card-body">
            <h5 class="card-title">Información del estudiante</h5>
            <br>
            <hr>

            <!-- Información del estudiante -->
            <div class="row">
                <div class="col-6">
                    <label for="">Nombre:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" aria-describedby="helpId"
                            value="{{ $datosDeMatricula->nombre }}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <label for="">Apellido:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="apellido" aria-describedby="helpId"
                            value="{{ $datosDeMatricula->apellido }}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <label for="">DNI:</label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="dni" aria-describedby="helpId"
                            value="{{ $datosDeMatricula->documento_de_identidad }}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <label for="">Master:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="master" aria-describedby="helpId"
                            value="{{ $datosDeMatricula->master->name }}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <label for="">Universidad:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="universidad" aria-describedby="helpId"
                            value="{{ $datosDeMatricula->university->name }}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <label for="">Situación Financiera:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="situacion_financiera" disabled
                            aria-describedby="helpId" value="{{ $datosDeMatricula->situacion_financiera }}" readonly>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- Tabla de asignaturas -->
                <div class="mx-auto mt-4">
                    <table class="table table-light">
                        <thead class="thead-dark">
                            <tr>
                                <th>N. módulos</th>
                                <th>Notas obtenidas</th>
                                <th>Estado</th>
                                <th>Baremos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $nota)
                                @for ($i = 1; $i <= 9; $i++)
                                    <tr>
                                        <!-- Asignatura -->
                                        <td>
                                            <div class="form-group">
                                                <input type="hidden" name="asignaturas_{{ $i }}"
                                                    value="{{ $nota["asignaturas_$i"] }}">
                                                <?php
                                                $codigo = $nota["asignaturas_$i"];
                                                $asignaturaConsulta = DB::table('asignatura')
                                                    ->where('code', $codigo)
                                                    ->first();
                                                ?>
                                                <input type="text" class="form-control" name=""
                                                    value="{{ $asignaturaConsulta ? $asignaturaConsulta->nombre : 'No encontrado' }}"
                                                    readonly>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group my-auto">
                                                <!-- Módulo -->
                                                <input type="text" value="{{ $nota["modulos_$i"] }}"
                                                    class="form-control modulo-input" name="modulos_{{ $i }}"
                                                    readonly>
                                            </div>
                                        </td>
                                        <!-- Estado -->
                                        <td>
                                            <div class="form-group my-auto">

                                                <input type="text" value="{{ $nota["estado_$i"] }}" class="form-control"
                                                    name="estado_{{ $i }}" readonly>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group mb-3">
                                                <!-- Baremo -->
                                                <input type="text" value="{{ $nota["baremos_$i"] }}"
                                                    class="form-control baremo-input" name="baremos_{{ $i }}"
                                                    readonly>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right mt-3">

                        <a href="{{ route('notas-de-matricula.index') }}" class="btn btn-danger">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    @stop

    @section('plugins.Select2', true)
    @section('plugins.Sweetalert2', true)

    @section('css')
        {{-- CSS personalizado --}}
    @stop

    @section('js')
        {{-- No necesitas JavaScript para una vista show --}}
    @stop
