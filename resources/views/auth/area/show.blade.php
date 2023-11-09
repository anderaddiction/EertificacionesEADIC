@extends('adminlte::page')

@section('title', 'Detalles de Área')

@section('content_header')
    <h1>Detalles de Área</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles de Área</h3>
        </div>
        <div class="card-body">
            <div class="form-row">


                <div class="form-group col-md-6">
                    <label for="code">Nombre del Área:</label>
                    <input type="text" class="form-control" id="code" value="{{ $area->name }}" readonly>
                </div>


            </div>
            <a type="button" class="btn btn-secondary" href="{{ route('area.index') }}">Regresar</a>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
