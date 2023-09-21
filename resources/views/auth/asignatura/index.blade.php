@extends('adminlte::page')
@section('title', 'Lista de asignaturas')
@section('content_header')
    <h3>Lista de asignaturas</h3>
@stop
@section('content')

    @if (session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '{{ session('info') }}',
                    icon: 'success'
                });
            });
        </script>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Seleccione el tipo de asignaturas a mostrar</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('asignatura.index') }}" method="get">
                            <div class="form-group col-md-6">
                                <label for="tipo_asignaturas">Tipo de Asignaturas</label>
                                <select class="form-control" name="tipo_asignaturas" id="tipo_asignaturas">
                                    <option value="sin_masters"
                                        {{ request('tipo_asignaturas') == 'sin_masters' ? 'selected' : '' }}>Asignaturas sin
                                        Masters</option>
                                    <option value="con_masters"
                                        {{ request('tipo_asignaturas') == 'con_masters' ? 'selected' : '' }}>Asignaturas con
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
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered nowrap" style="width:100%">
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
                                        <td>
                                            @if (is_null($asignatura->updated_at))
                                                <p>No se posee fecha</p>
                                            @else
                                                {{ $asignatura->updated_at->format('d/m/Y') }}
                                            @endif

                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('asignatura.show', $asignatura) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('asignatura.edit', $asignatura) }}"
                                                    class="btn btn-success btn-sm mx-2"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('asignatura.destroy', $asignatura) }}"
                                                    method="POST">
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

            </div>
    </div>
@elseif ($tipoAsignaturas == 'con_masters')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> Mostrar la tabla de asignaturas con masters</h5>
            <br>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered nowrap" style="width:100%">
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
                                <td>
                                    @if (is_null($asignatura->updated_at))
                                        <p>No se posee fecha</p>
                                    @else
                                        {{ $asignatura->updated_at->format('d/m/Y') }}
                                    @endif

                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('asignatura.show', $asignatura) }}" class="btn btn-info btn-sm">
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
    </div>
@elseif ($tipoAsignaturas == 'todas')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mostrar la tabla de todas las asignaturas</h5>
            <br>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered nowrap" style="width:100%">
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
                                <td>
                                    @if (is_null($asignatura->updated_at))
                                        <p>No se posee fecha</p>
                                    @else
                                        {{ $asignatura->updated_at->format('d/m/Y') }}
                                    @endif

                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('asignatura.show', $asignatura) }}" class="btn btn-info btn-sm">
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
    </div>
    @endif
    </div>


@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $("#example2").DataTable({
                "dom": 'Bfrtip',
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
@stop
