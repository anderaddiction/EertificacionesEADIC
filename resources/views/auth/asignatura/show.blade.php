@extends('adminlte::page')

@section('title', 'Detalles de asignatura')

@section('content_header')
    <h1>Detalles de asignatura</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles de asignatura</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="master">Master(s):</label>
                    <ul>
                        @foreach ($asignatura->masters as $master)
                            <li>{{ $master->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="form-group col-md-6">
                    <label for="code">Código de la asignatura:</label>
                    <input type="text" class="form-control" id="code" value="{{ $asignatura->code }}" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="numero_de_la_asignatura">Número de la asignatura:</label>
                    <input type="text" class="form-control" id="numero_de_la_asignatura"
                        value="{{ $asignatura->numero_de_la_asignatura }}" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="nombre">Nombre de la asignatura:</label>
                    <input type="text" class="form-control" id="nombre" value="{{ $asignatura->nombre }}" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="creditos">Creditos:</label>
                    <input type="text" class="form-control" id="creditos" value="{{ $asignatura->creditos }}" readonly>
                </div>
            </div>
            <a type="button" class="btn btn-secondary" href="{{ route('asignatura.index') }}">Regresar</a>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
