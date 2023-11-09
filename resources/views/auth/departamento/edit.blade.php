@extends('adminlte::page')

@section('title', 'Editar departamento')

@section('content_header')
    <h1>Editar departamento</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar departamento</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('departamento.update', $departamento->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $departamento->id }}">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre:</label>
                            <input name="name" type="text" class="form-control" id="name"
                                value="{{ old('name', $departamento->name) }}" placeholder="Nombre del departamento">
                            @error('name')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="codigo">Código :</label>
                            <input name="codigo" type="text" class="form-control" id="codigo"
                                value="{{ old('codigo', $departamento->codigo) }}" placeholder="Código del departamento">
                            @error('codigo')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="0"
                                        {{ old('status', $departamento->status) == 0 ? 'selected' : '' }}>No aprobado
                                    </option>
                                    <option value="1"
                                        {{ old('status', $departamento->status) == 1 ? 'selected' : '' }}>Aprobado</option>
                                </select>
                            </div>
                            @error('status')
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
