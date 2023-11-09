@extends('adminlte::page')

@section('title', 'Detalles de departamento')

@section('content_header')
    <h1>Detalles de departamento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles de departamento</h3>
        </div>
        <div class="card-body">
            <div class="form-row">


                <div class="form-group col-md-6">
                    <label for="code">Nombre del departamento:</label>
                    <input type="text" class="form-control" id="code" value="{{ $departamento->name }}" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="numero_de_la_departamento">Codigo de departamento:</label>
                    <input type="text" class="form-control" value="{{ $departamento->codigo }}" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="nombre">Estado de departamento:</label>
                    <input type="text" class="form-control" id="nombre"
                        value=" @if ($departamento->status == 1) Aprobado @else No aprobado @endif" readonly>
                </div>

            </div>
            <a type="button" class="btn btn-secondary" href="{{ route('departamento.index') }}">Regresar</a>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
