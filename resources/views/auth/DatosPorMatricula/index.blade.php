@extends('adminlte::page')
@section('title', 'Lista de datos de matriculas')
@section('content_header')
    <h3>
        Lista de datos de matriculas</h3>
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
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <!-- Botón que abre el modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Importar CSV o Excel
                </button>
                <br>
                <!-- El Modal -->
                <div class="modal fade " id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Cabecera del Modal -->
                            <div class="modal-header">
                                <h4 class="modal-title">Acciones CSV o Excel</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Contenido del Modal -->
                            <div class="modal-body">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur cum nobis, eligendi,
                                    consectetur quibusdam adipisci natus accusamus possimus beatae perferendis itaque sint
                                    totam earum quia atque aliquid? Voluptate, pariatur placeat?</p>
                                <a href="/documents/plantilla.xlsx" class="btn btn-secondary" download>
                                    <i class="fas fa-arrow-down"></i> Descargar plantilla XML
                                </a>
                                <br>
                                <p>Seleccione una acción:</p>

                                <br>

                                @csrf
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="excelFile" name="excelFile">
                                        <label class="custom-file-label" for="excelFile">Selecciona un archivo
                                            CSV</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-upload"></i> Cargar CSV
                                        </button>
                                    </div>
                                </div>
                                </form>



                            </div>

                            <!-- Pie del Modal -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>

                        </div>
                    </div>
                </div>

                <br>

                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Documento</th>
                                <th>Email</th>
                                <th>Nombre oportunidad</th>
                                <th>Código único estudiante</th>
                                <th>Última actualización</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($datosPorMatriculas as $datosPorMatricula)
                                <tr>
                                    <td>{{ $datosPorMatricula->id }}</td>
                                    <td>{{ $datosPorMatricula->nombre }}</td>
                                    <td>{{ $datosPorMatricula->apellido }}</td>
                                    <td>{{ $datosPorMatricula->documento_de_identidad }}</td>
                                    <td>{{ $datosPorMatricula->email }}</td>
                                    <td>{{ $datosPorMatricula->nombreOportunidad }}</td>
                                    <td>{{ $datosPorMatricula->codigoUnicoEstudiante }}</td>
                                    <td>
                                        @if (is_null($datosPorMatricula->updated_at))
                                            <p>No se posee fecha</p>
                                        @else
                                            {{ $datosPorMatricula->updated_at->format('d/m/Y') }}
                                        @endif

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('datos-de-matricula.show', $datosPorMatricula) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('datos-de-matricula.edit', $datosPorMatricula) }}"
                                                class="btn btn-success btn-sm mx-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('datos-de-matricula.destroy', $datosPorMatricula) }}"
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

    <!-- Agrega el script para habilitar la exportación a PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                "responsive": true,
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
