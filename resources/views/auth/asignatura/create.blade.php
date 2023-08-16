@extends('adminlte::page')

@section('title', 'Crear asignatura')

@section('content_header')
    <h1>Crear asignatura</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Crear asignatura</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('asignatura.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="code">Código de la asignatura:</label>
                            <input name="code" type="text" class="form-control" id="code"
                                value="{{ old('code') }}" placeholder="Código de la asignatura">
                            @error('code')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="numero_de_la_asignatura">Número de la asignatura:</label>
                            <input name="numero_de_la_asignatura" type="number" class="form-control"
                                id="numero_de_la_asignatura" value="{{ old('numero_de_la_asignatura') }}"
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
                                value="{{ old('nombre') }}" placeholder="Nombre de la asignatura">
                            @error('nombre')
                                <div class="text-danger mx-auto">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="creditos">Creditos:</label>
                            <input name="creditos" type="text" class="form-control" id="creditos"
                                value="{{ old('creditos') }}" placeholder="Nombre de la asignatura">
                            @error('creditos')
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Seleccione el tipo de asignaturas a mostrar</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('asignatura.create') }}" method="get">
                            <div class="form-group col-md-6">
                                <label for="tipo_asignaturas">Tipo de Asignaturas</label>
                                <select class="form-control" name="tipo_asignaturas" id="tipo_asignaturas">
                                    <option value="sin_masters"
                                        {{ request('tipo_asignaturas') == 'sin_masters' ? 'selected' : '' }}>Asignaturas
                                        sin
                                        Masters</option>
                                    <option value="con_masters"
                                        {{ request('tipo_asignaturas') == 'con_masters' ? 'selected' : '' }}>Asignaturas
                                        con
                                        Masters</option>
                                    <option value="todas" {{ request('tipo_asignaturas') == 'todas' ? 'selected' : '' }}>
                                        Todas las Asignaturas</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Mostrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if ($tipoAsignaturas == 'sin_masters')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Mostrar la tabla de asignaturas sin masters</h5>

                    <br>
                    <table id="example2" class="table table-bordered table-hover dt-responsive nowrap">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Número de asignatura</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Master</th>
                                <th>Última actualización</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($asignaturas as $asignatura)
                                <tr>
                                    <td>{{ $asignatura->id }}</td>
                                    <td>{{ $asignatura->code }}</td>
                                    <td>{{ $asignatura->numero_de_la_asignatura }}</td>
                                    <td>{{ $asignatura->nombre }}</td>
                                    <td>{{ $asignatura->creditos }}</td>
                                    <td>
                                        @foreach ($asignatura->masters as $master)
                                            {{ $master->master_code }}
                                        @endforeach
                                    </td>
                                    <td>{{ $asignatura->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('asignatura.show', $asignatura) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('asignatura.edit', $asignatura) }}"
                                                class="btn btn-success btn-sm mx-2"> <i class="fas fa-edit"></i></a>
                                            <form action="{{ route('asignatura.destroy', $asignatura) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger delete-button">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        @elseif ($tipoAsignaturas == 'con_masters')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Mostrar la tabla de asignaturas con masters</h5>
                    <br>

                    <table id="example2" class="table table-bordered table-hover dt-responsive nowrap">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Número de asignatura</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Master</th>
                                <th>Última actualización</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($asignaturas as $asignatura)
                                <tr>
                                    <td>{{ $asignatura->id }}</td>
                                    <td>{{ $asignatura->code }}</td>
                                    <td>{{ $asignatura->numero_de_la_asignatura }}</td>
                                    <td>{{ $asignatura->nombre }}</td>
                                    <td>{{ $asignatura->creditos }}</td>
                                    <td>
                                        @foreach ($asignatura->masters as $master)
                                            {{ $master->master_code }}
                                        @endforeach
                                    </td>
                                    <td>{{ $asignatura->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('asignatura.show', $asignatura) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('asignatura.edit', $asignatura) }}"
                                                class="btn btn-success btn-sm mx-2"> <i class="fas fa-edit"></i></a>
                                            <form action="{{ route('asignatura.destroy', $asignatura) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger delete-button">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        @elseif ($tipoAsignaturas == 'todas')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mostrar la tabla de todas las asignaturas</h5>
                    <br>

                    <table id="example2" class="table table-bordered table-hover dt-responsive nowrap">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Número de asignatura</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Master</th>
                                <th>Última actualización</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($asignaturas as $asignatura)
                                <tr>
                                    <td>{{ $asignatura->id }}</td>
                                    <td>{{ $asignatura->code }}</td>
                                    <td>{{ $asignatura->numero_de_la_asignatura }}</td>
                                    <td>{{ $asignatura->nombre }}</td>
                                    <td>{{ $asignatura->creditos }}</td>
                                    <td>
                                        @foreach ($asignatura->masters as $master)
                                            {{ $master->master_code }}
                                        @endforeach
                                    </td>
                                    <td>{{ $asignatura->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('asignatura.show', $asignatura) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('asignatura.edit', $asignatura) }}"
                                                class="btn btn-success btn-sm mx-2"> <i class="fas fa-edit"></i></a>
                                            <form action="{{ route('asignatura.destroy', $asignatura) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger delete-button">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        @endif
    </div>


@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
