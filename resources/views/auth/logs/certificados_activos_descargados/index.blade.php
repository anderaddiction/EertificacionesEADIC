@extends('adminlte::page')

@section('title', __('Historial de Certificados Activos Descargados'))

@section('content_header')
<h1>{{ __('Historial de Certificados Activos Descargados') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- DATATABLE EXAMPLE -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Certificados Activos Descargados') }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{-- <div class="col-sm-1 mb-3">
                <a href="{{ route('master.create') }}" class="btn btn-block bg-gradient-primary"
                    title="{{ __('Add') }}"><i class="fas fa-pencil"></i></a>
            </div>
            <div class="col-12 mb-3">
                @if (session()->has('Success'))
                <div class="alert bg-teal alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-check"></i> Feliciades! {{ session('Success') }}</h6>
                </div>
                @endif
            </div> --}}
            <table id="example2" class="table table-bordered table-hover dt-responsive nowrap">
                <thead class="text-center">
                    <tr>
                        <th>{{ __('Correo') }}</th>
                        <th>{{ __('Master') }}</th>
                        <th>{{ __('Universidad') }}</th>
                        <th>{{ __('Created At') }}</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($cert_activ_descargados as $descargados)
                    <tr>
                        <td>{{ $descargados->present()->email() }}</td>
                        <td>{{ $descargados->present()->master() }}</td>
                        <td>{{ $descargados->present()->universidad() }}</td>
                        <td>{{ $descargados->present()->downloadedDate() }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="text-center">
                    <tr>
                        <th>{{ __('Correo') }}</th>
                        <th>{{ __('Master') }}</th>
                        <th>{{ __('Universidad') }}</th>
                        <th>{{ __('Created At') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
        </div>
    </div>
    <!-- /.card -->
</div>

@stop

@section('plugins.Select2', true)

@section('css')
{{-- Here your customs css --}}
@stop

@section('js')
<script>
    $(document).ready(function () {
        $("#example2").DataTable({
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });
</script>
@stop
