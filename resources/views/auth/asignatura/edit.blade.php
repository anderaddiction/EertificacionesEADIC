@extends('adminlte::page')

@section('title', 'Editar asignatura')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar asignatura</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('asignatura.update', $asignatura->id) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-group col-md-12">
                            <label for="master">Seleccione el master:</label>
                            <select class="form-control select2" name="master" id="master">
                                <option hidden selected disabled>Seleccionar:</option>
                                @foreach ($masters as $master)
                                    <option value="{{ $master->id }}"
                                        {{ $master->id === $asignatura->master_id ? 'selected' : '' }}>
                                        {{ $master->master_code }}
                                    </option>
                                @endforeach
                            </select>
                            @error('master')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-group col-md-6">
                        <label for="code">Código de la asignatura:</label>
                        <input name="code" type="text" class="form-control" id="code"
                            value="{{ $asignatura->code }}" placeholder="Código de la asignatura">
                        @error('code')
                            <div class="text-danger mx-auto">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="numero_de_la_asignatura">Número de la asignatura:</label>
                        <input name="numero_de_la_asignatura" type="text" class="form-control"
                            id="numero_de_la_asignatura" value="{{ $asignatura->numero_de_la_asignatura }}"
                            placeholder="Número de la asignatura">
                        @error('numero_de_la_asignatura')
                            <div class="text-danger mx-auto">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre de la asignatura:</label>
                        <input name="nombre" type="text" class="form-control" id="nombre"
                            value="{{ $asignatura->nombre }}" placeholder="Nombre de la asignatura">
                        @error('nombre')
                            <div class="text-danger mx-auto">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="creditos">Creditos:</label>
                        <input name="creditos" type="text" class="form-control" id="creditos"
                            value="{{ $asignatura->creditos }}" placeholder="Nombre de la asignatura">
                        @error('creditos')
                            <div class="text-danger mx-auto">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>

                <a type="button" class="btn btn-secondary" href="{{ route('asignatura.index') }}">Regresar</a>
            </form>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Inicializa Select2 y personaliza las clases CSS
            $('.select2').select2({
                theme: 'bootstrap4' // Utiliza el tema de Bootstrap 4 para Select2
            });
        });
    </script>
@stop
