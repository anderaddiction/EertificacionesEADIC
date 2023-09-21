@extends('adminlte::page')

@section('title', 'Crear datos de matricula')

@section('content_header')
    <h1>Crear datos de matricula</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">

            <div class="card-body">
                <form method="POST" action="{{ route('datos-de-matricula.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="nombre"
                                value="{{ old('nombre') }}" placeholder="Nombre">
                            @error('nombre')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido:</label>
                            <input name="apellido" type="text" class="form-control" id="apellido"
                                value="{{ old('apellido') }}" placeholder="Apellido">
                            @error('apellido')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="documento_de_identidad">Documento de Identidad:</label>
                            <input name="documento_de_identidad" type="text" class="form-control"
                                id="documento_de_identidad" value="{{ old('documento_de_identidad') }}"
                                placeholder="Documento de Identidad">
                            @error('documento_de_identidad')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input name="email" type="email" class="form-control" id="email"
                                value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_master">Seleccione Master:</label>
                            <select name="id_master" id="id_master" class="form-control select2">
                                @foreach ($masters as $master)
                                    <option value="{{ $master->id }}">{{ $master->name }}</option>
                                @endforeach
                            </select>
                            @error('id_master')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_universities">Seleccione Universidad:</label>
                            <select name="id_universities" id="id_universities" class="form-control select2">
                                @foreach ($universidades as $universidad)
                                    <option value="{{ $universidad->id }}">{{ $universidad->name }}</option>
                                @endforeach
                            </select>
                            @error('id_universities')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="situacion_financiera">Situación Financiera:</label>
                            <input name="situacion_financiera" type="text" class="form-control" id="situacion_financiera"
                                value="{{ old('situacion_financiera') }}" placeholder="Situación Financiera">
                            @error('situacion_financiera')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="estado_matricula">Estado Matricula:</label>
                            <input name="estado_matricula" type="text" class="form-control" id="estado_matricula"
                                value="{{ old('estado_matricula') }}" placeholder="Estado Matricula">
                            @error('estado_matricula')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="modalidad_de_estudio">Modalidad de Estudio:</label>
                            <input name="modalidad_de_estudio" type="text" class="form-control" id="modalidad_de_estudio"
                                value="{{ old('modalidad_de_estudio') }}" placeholder="Modalidad de Estudio">
                            @error('modalidad_de_estudio')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="estado_formacion">Estado Formación:</label>
                            <input name="estado_formacion" type="text" class="form-control" id="estado_formacion"
                                value="{{ old('estado_formacion') }}" placeholder="Estado Formación">
                            @error('estado_formacion')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edicion_master">Edición Master:</label>
                            <input name="edicion_master" type="text" class="form-control" id="edicion_master"
                                value="{{ old('edicion_master') }}" placeholder="Edición Master">
                            @error('edicion_master')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fecha_inicio">Fecha Inicio:</label>
                            <input name="fecha_inicio" type="date" class="form-control" id="fecha_inicio"
                                value="{{ old('fecha_inicio') }}" placeholder="Fecha Inicio">
                            @error('fecha_inicio')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fecha_fin">Fecha Fin:</label>
                            <input name="fecha_fin" type="date" class="form-control" id="fecha_fin"
                                value="{{ old('fecha_fin') }}" placeholder="Fecha Fin">
                            @error('fecha_fin')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="numero_oportunidad">Número Oportunidad:</label>
                            <input name="numero_oportunidad" type="text" class="form-control" id="numero_oportunidad"
                                value="{{ old('numero_oportunidad') }}" placeholder="Número Oportunidad">
                            @error('numero_oportunidad')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nombreOportunidad">Nombre Oportunidad:</label>
                            <input name="nombreOportunidad" type="text" class="form-control" id="nombreOportunidad"
                                value="{{ old('nombreOportunidad') }}" placeholder="Nombre Oportunidad">
                            @error('nombreOportunidad')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="codigoUnicoEstudiante">Código único estudiante:</label>
                            <input name="codigoUnicoEstudiante" type="text" class="form-control"
                                id="codigoUnicoEstudiante" value="{{ old('codigoUnicoEstudiante') }}"
                                placeholder="Codigo Unico estudiante">
                            @error('codigoUnicoEstudiante')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Agrega el CSS de Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
@stop

@section('js')
    <!-- Agrega la biblioteca de Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Inicializa los campos select2 -->
    <script>
        $('.select2').select2({
            theme: 'bootstrap4' // Utiliza el tema de Bootstrap 4 para Select2
        });
    </script>
@stop
