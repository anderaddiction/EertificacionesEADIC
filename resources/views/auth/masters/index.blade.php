@extends('adminlte::page')

@section('title', __('Masters'))

@section('content_header')
    <h1>{{ __('Masters') }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <!-- DATATABLE EXAMPLE -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Masters Table') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-sm-12 mb-3 d-flex justify-content-between">
                    <a href="{{ route('master.create') }}" class="btn bg-gradient-primary">Crear master<i
                            class="fas fa-pencil"></i></a>

                    <a href="#" class="btn btn-success">Importar csv</a>
                </div>

                <div class="col-12 mb-3">
                    @if (session()->has('Success'))
                        <div class="alert bg-teal alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h6><i class="icon fas fa-check"></i> Felicidades! {{ session('Success') }}</h6>
                        </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover dt-responsive nowrap">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Code') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Master Code') }}</th>
                                <th>{{ __('Status') }}</th>
                                {{-- <th>{{ __('Note') }}</th> --}}
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($masters as $master)
                                <tr>
                                    <td>{{ $master->present()->id() }}</td>
                                    <td>{{ $master->present()->code() }}</td>
                                    <td>{{ $master->present()->name() }}</td>
                                    <td>{{ $master->present()->codeMaster() }}</td>
                                    <td>{!! $master->present()->status() !!}</td>
                                    {{-- <td>{{ $master->present()->note() }}</td> --}}
                                    <td>{{ $master->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <form action="{{ route('master.destroy', $master) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {!! $master->present()->actionButtons() !!}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
        <!-- /.card -->
    </div>

@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('css')
    {{-- Incluye los estilos de DataTables y DataTables Buttons --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
    {{-- Aquí puedes agregar tu CSS personalizado si es necesario --}}
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#example2").DataTable({
                "responsive": false,
                "buttons": ["copy", "csv", "excel", "print", "colvis"],
                "dom": 'Bfrtip',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });
    </script>
@stop
