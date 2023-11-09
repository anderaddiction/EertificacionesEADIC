@extends('adminlte::page')

@section('title', 'Editar área')

@section('content_header')
    <h1>Editar área</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar área</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('area.update', $area->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $area->id }}">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre:</label>
                            <input name="name" type="text" class="form-control" id="name"
                                value="{{ old('name', $area->name) }}" placeholder="Nombre del area">
                            @error('name')
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
