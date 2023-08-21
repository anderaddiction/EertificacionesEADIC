@extends('adminlte::page')

@section('title', 'Detalles de la matrícula')

@section('content_header')
    <h1>Detalles de la matrícula</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalles de la matrícula</h3>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input name="nombre" type="text" class="form-control" id="nombre"
                            value="{{ $datosDeMatricula->nombre }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido:</label>
                        <input name="apellido" type="text" class="form-control" id="apellido"
                            value="{{ $datosDeMatricula->apellido }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="documento_de_identidad">Documento de Identidad:</label>
                        <input name="documento_de_identidad" type="text" class="form-control" id="documento_de_identidad"
                            value="{{ $datosDeMatricula->documento_de_identidad }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input name="email" type="email" class="form-control" id="email"
                            value="{{ $datosDeMatricula->email }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="id_master">Master seleccionado:</label>
                        <input name="id_master" type="text" class="form-control" id="id_master"
                            value="{{ $datosDeMatricula->master->name }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_universidades">Universidad seleccionada:</label>
                        <input name="id_universidades" type="text" class="form-control" id="id_universidades"
                            value="{{ $datosDeMatricula->university->name }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="situacion_financiera">Situación Financiera:</label>
                        <input name="situacion_financiera" type="text" class="form-control" id="situacion_financiera"
                            value="{{ $datosDeMatricula->situacion_financiera }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="estado_matricula">Estado Matrícula:</label>
                        <input name="estado_matricula" type="text" class="form-control" id="estado_matricula"
                            value="{{ $datosDeMatricula->estado_matricula }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="modalidad_de_estudio">Modalidad de Estudio:</label>
                        <input name="modalidad_de_estudio" type="text" class="form-control" id="modalidad_de_estudio"
                            value="{{ $datosDeMatricula->modalidad_de_estudio }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="estado_formacion">Estado Formación:</label>
                        <input name="estado_formacion" type="text" class="form-control" id="estado_formacion"
                            value="{{ $datosDeMatricula->estado_formacion }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="edicion_master">Edición Master:</label>
                        <input name="edicion_master" type="text" class="form-control" id="edicion_master"
                            value="{{ $datosDeMatricula->edicion_master }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_inicio">Fecha de Inicio:</label>
                        <input name="fecha_inicio" type="text" class="form-control" id="fecha_inicio"
                            value="{{ $datosDeMatricula->fecha_inicio }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_fin">Fecha de Fin:</label>
                        <input name="fecha_fin" type="text" class="form-control" id="fecha_fin"
                            value="{{ $datosDeMatricula->fecha_fin }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="numero_oportunidad">Número de Oportunidad:</label>
                        <input name="numero_oportunidad" type="text" class="form-control" id="numero_oportunidad"
                            value="{{ $datosDeMatricula->numero_oportunidad }}" readonly>
                    </div>
                    <a type="button" class="btn btn-secondary"
                        href="{{ route('datos-de-matricula.index') }}">Regresar</a>
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
