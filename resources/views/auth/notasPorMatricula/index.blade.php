@extends('adminlte::page')
@section('title', 'Lista de datos de matriculas')
@section('content_header')
    <h3>Lista de Notas por matriculas</h3>
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> Mostrar la tabla</h5>
                <br>

                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover table-sm">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>Master</th>
                                <th>Universidad</th>
                                <th>Email</th>
                                <th>Situacion financiera</th>
                                <th>Estado</th>
                                <th width="200px">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($datosPorMatriculas as $datosPorMatricula)
                                <tr>
                                    <td>{{ $datosPorMatricula->id }}</td>
                                    <td>{{ $datosPorMatricula->nombre }}</td>
                                    <td>{{ $datosPorMatricula->apellido }}</td>
                                    <td>{{ $datosPorMatricula->documento_de_identidad }}</td>
                                    <td>{{ $datosPorMatricula->master->master_code }}</td>
                                    <td>{{ $datosPorMatricula->university->name }}</td>
                                    <td>{{ $datosPorMatricula->email }}</td>
                                    <td>{{ $datosPorMatricula->situacion_financiera }}
                                    <td>
                                        <?php
                                        $alumno = $datosPorMatricula->id;
                                        $datosDeMatriculas = DB::table('notas_por_matricula')
                                            ->where('id_datos_por_matricula', $alumno)
                                            ->get();
                                        ?>
                                        @if ($datosDeMatriculas->isEmpty())
                                            <p>No tiene notas</p>
                                        @else
                                            @foreach ($datosDeMatriculas as $datosDeMatricula)
                                                @if ($datosDeMatricula->bloqueado == 1)
                                                    <p>Bloqueado</p>
                                                @else
                                                    <p>No bloqueado</p>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>

                                    <td>
                                        <div class="btn-group" role="group">

                                            @if ($datosDeMatriculas->isEmpty())
                                                <a href="{{ route('notas-de-matricula.create', $datosPorMatricula->id) }}"
                                                    class="btn btn-primary btn-sm mx-2">Cargar notas</a>
                                            @else
                                                @foreach ($datosDeMatriculas as $datosDeMatricula)
                                                    @if ($datosDeMatricula->bloqueado == 1)
                                                        <a href="{{ route('notas-de-matricula.show', $datosPorMatricula->id) }}"
                                                            class="btn btn-sm btn-secondary">Ver</a>
                                                    @else
                                                        <a href="{{ route('notas-de-matricula.edit', $datosPorMatricula->id) }}"
                                                            class="btn btn-sm btn-success mx-2">Editar actas</a>
                                                    @endif
                                                @endforeach
                                            @endif
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
@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('css')
    {{-- Agrega el enlace al CSS de DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    {{-- Agrega el enlace al CSS de DataTables Responsive --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    {{-- Agrega el enlace al CSS de DataTables Buttons --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    {{-- Agrega el enlace al CSS de Select2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Agrega los scripts para habilitar la exportación a PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                },
                "dom": 'Bfrtip',
                "buttons": [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ]
            });

            // Aplica la búsqueda en las columnas
            table.columns().every(function() {
                var that = this;
                $('input', this.header()).on('keyup change clear', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // Inicializa Select2 para columnas de búsqueda
            $('#example2 thead th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
            });
        });
    </script>
@stop
