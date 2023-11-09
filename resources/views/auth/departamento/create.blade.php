    @extends('adminlte::page')

    @section('title', 'Crear departamento')

    @section('content_header')
        <h1>Crear departamento</h1>
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear departamento</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('departamento.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre:</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    value="{{ old('name') }}" placeholder="Nombre del departamento">
                                @error('name')
                                    <div class="text-danger mx-auto">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="codigo">Código :</label>
                                <input name="codigo" type="text" class="form-control" id="codigo"
                                    value="{{ old('codigo') }}" placeholder="Código del departamento">
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
                                        <option value="0">No aprobado</option>
                                        <option value="1">Aprobado</option>
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

    @section('css')
        {{-- Agrega aquí cualquier estilo CSS adicional que necesites --}}
    @stop

    @section('js')
        {{-- Agrega aquí cualquier script JavaScript adicional que necesites --}}
    @stop
