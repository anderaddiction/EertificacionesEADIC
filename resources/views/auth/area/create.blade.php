    @extends('adminlte::page')

    @section('title', 'Crear área')

    @section('content_header')
        <h1>Crear área</h1>
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear área</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('area.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre:</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    value="{{ old('name') }}" placeholder="Nombre del área">
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

    @section('css')
        {{-- Agrega aquí cualquier estilo CSS adicional que necesites --}}
    @stop

    @section('js')
        {{-- Agrega aquí cualquier script JavaScript adicional que necesites --}}
    @stop
