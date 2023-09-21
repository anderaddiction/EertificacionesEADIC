@extends('adminlte::page')
@section('title', 'Cargar notas a matriculas')

@section('content_header')
    <h3>Cargar actas</h3>
@stop

@section('content')


    <!-- Información personal del estudiante -->
    <div class="card p-2">
        <div class="card-body">
            <h5 class="card-title mb-2">Información del estudiante</h5>
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
                            aria-describedby="helpId" value="{{ $datosDeMatricula->situacion_financiera }}">
                    </div>
                </div>
            </div>

            <!-- Tabla de asignaturas -->
            <div class="table-responsive">
                <table class="mt-4 table table-light table-hover  table-sm  w-100 table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th class="w-50">Nombre modulo</th>
                            <th width="70px">Credito</th>
                            <th width="100px">Nota</th>
                            <th width="150px">Estado</th>
                            <th>Baremo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form role="form" action="{{ route('notas-de-matricula.store') }}" method="post">
                            @php $numero = 0; @endphp
                            @csrf
                            <input type="hidden" name="id_datos_por_matricula" value="{{ $datosDeMatricula->id }}">
                            @foreach ($asignaturas as $asignatura)
                                @php
                                    $numero++;
                                @endphp

                                <tr>
                                    <!-- Campo Asignaturas -->
                                    <td>
                                        <input type="text" class="form-control" name=""
                                            value="{{ $asignatura->nombre }}" readonly>

                                        <input type="hidden" name="asignatura_{{ $numero }}"
                                            value="{{ $asignatura->code }}">
                                        @error('asignatura_{{ $numero }}')
                                            <div class="text-danger mx-auto">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                    <td><input type="text" class="form-control" name=""
                                            value="{{ $asignatura->creditos }}" readonly></td>
                                    <!-- Campo Módulos -->
                                    <td>
                                        <input type="text" class="form-control modulo-input"
                                            name="modulo_{{ $numero }}" placeholder="Módulo {{ $numero }}"
                                            data-baremo-selector="#baremo_{{ $numero }}">
                                        @error('modulo_{{ $numero }}')
                                            <div class="text-danger mx-auto">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                    <!-- Campo Estados -->
                                    <td>
                                        <select class="form-control" name="estado_{{ $numero }}">
                                            <option disabled selected hidden>Seleccione el estado</option>
                                            <option value="Superado">Superado</option>
                                            <option value="Pendiente">Pendiente</option>
                                        </select>
                                        @error('estado_{{ $numero }}')
                                            <div class="text-danger mx-auto">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                    <!-- Campo Baremos -->
                                    <td>

                                        <input class="form-control baremo-input" name="baremo_{{ $numero }}"
                                            id="baremo_{{ $numero }}" readonly>
                                        @error('baremo_{{ $numero }}')
                                            <div class="text-danger mx-auto">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                    </td>
                                </tr>


                                </tr>
                            @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-3">
                <label for="">Cerrar actas:</label>
                <div class="form-group">
                    <select class="form-control" name="bloqueado" required>
                        <option disabled selected hidden>Seleccione </option>
                        <option value="0">No</option>
                        <option value="1">Si</option>
                        <option value="2">Acta pendiente</option>
                    </select>
                </div>
                @error('bloqueado')
                    <div class="text-danger mx-auto">
                        {{ $message }}
                    </div>
                @enderror
            </div>




            <div class="float-right mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('notas-de-matricula.buscar') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
        </form>

    </div>
@stop

@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)

@section('css')
    {{-- CSS personalizado --}}
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modulos = document.querySelectorAll('.modulo-input');
            const estados = document.querySelectorAll('select[name^="estado_"]');
            const baremos = document.querySelectorAll('input[name^="baremo_"]');

            function calcularCalificacion(moduloValue) {
                if (isNaN(moduloValue)) {
                    return 'Invalido';
                } else if (moduloValue <= 4.9) {
                    return 'Suspenso';
                } else if (moduloValue >= 5 && moduloValue <= 6.9) {
                    return 'Aprobado';
                } else if (moduloValue >= 7 && moduloValue <= 8.9) {
                    return 'Notable';
                } else if (moduloValue <= 10) {
                    return 'Sobresaliente';
                } else {
                    return 'Fuera de rango';
                }
            }

            function updateBaremo(index) {
                return function() {
                    const moduloValue = parseFloat(modulos[index].value);
                    const estadoValue = estados[index].value;
                    const baremoInput = baremos[index];

                    if (estadoValue === 'Pendiente') {
                        baremoInput.value = 'Suspenso';
                    } else {
                        const calificacion = calcularCalificacion(moduloValue);
                        baremoInput.value = calificacion;
                    }
                };
            }

            modulos.forEach((modulo, index) => {
                modulo.addEventListener('change', updateBaremo(index));
            });

            estados.forEach((estado, index) => {
                estado.addEventListener('change', updateBaremo(index));
            });
        });
    </script>

@stop
