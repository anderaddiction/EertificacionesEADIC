@extends('adminlte::page')
@section('title', 'Editar actas')

@section('content_header')
    <h3>Editar actas</h3>
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

            <div class="card-body">


                <!-- Tabla de asignaturas -->
                <div class="table-responsive">
                    <table class="mt-4 table table-light table-hover table-sm w-100 ">
                        <thead class="thead-dark">
                            <tr>
                                <th class="w-50">Nombre modulo</th>
                                <th width="70px">Credito</th>
                                <th width="100px">Nota</th>
                                <th width="200px">Estado</th>
                                <th>Baremo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form role="form" action="{{ route('notas-de-matricula.update', $notas[0]['id']) }}"
                                method="post">
                                @method('PUT')
                                @csrf

                                @foreach ($notas as $nota)
                                    <input type="hidden" value="{{ $nota['id'] }}" name="id">

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

                                            <td><input type="text" class="form-control" name=""
                                                    value="{{ $asignaturaConsulta ? $asignaturaConsulta->creditos : 'No encontrado' }}"
                                                    readonly></td>
                                            <td>
                                                <div class="form-group my-auto">
                                                    <!-- Módulo -->
                                                    <input type="text" value="{{ $nota["modulos_$i"] }}"
                                                        class="form-control modulo-input"
                                                        name="modulos_{{ $i }}"
                                                        data-baremo-selector="#baremo_{{ $i }}">
                                                </div>
                                            </td>
                                            <!-- Estado -->
                                            <td>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Usa la clase que corresponda según tus necesidades -->
                                                        <div class="form-group mb-3">
                                                            <select class="form-control" name="estado_{{ $i }}">
                                                                <option disabled selected hidden>Seleccione el nuevo estado
                                                                </option>
                                                                <option value="Superado">Superado</option>
                                                                <option value="Pendiente">Pendiente</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <small> {{ $nota["estado_$i"] }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-3">
                                                    <!-- Baremo -->
                                                    <input type="text" value="{{ $nota["baremos_$i"] }}"
                                                        class="form-control baremo-input"
                                                        name="baremos_{{ $i }}" id="baremo_{{ $i }}"
                                                        readonly>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
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
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('notas-de-matricula.buscar') }}" class="btn btn-danger">Cancelar</a>
                </div>

                </form>
            </div>
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
                const baremos = document.querySelectorAll('input[name^="baremos_"]');

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
