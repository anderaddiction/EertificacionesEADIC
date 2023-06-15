@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>{{ __('Roles') }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <!-- DATATABLE EXAMPLE -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ ('Roles Table') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-sm-1 mb-3">
                    <a href="{{ route('role.create') }}" class="btn btn-block bg-gradient-primary" title="{{ __('Add') }}"><i
                            class="fas fa-pencil"></i></a>
                </div>
                <div class="col-12 mb-3">
                    @if (session()->has('Success'))
                    <div class="alert bg-teal alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h6><i class="icon fas fa-check"></i> Feliciades! {{ session('Success') }}</h6>
                    </div>
                    @endif
                </div>
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Display Name') }}</th>
                            <th>{{ __('Note') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->present()->id() }}</td>
                                <td>{{ $role->present()->code() }}</td>
                                <td>{{ $role->present()->name() }}</td>
                                <td>{{ $role->present()->displayName() }}</td>
                                <td>{{ $role->present()->note() }}</td>
                                <td>{{ $role->present()->createdAt() }}</td>
                                <td>
                                    <form action="{{ route('role.destroy', $role) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {!! $role->present()->actionButtons() !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Display Name') }}</th>
                            <th>{{ __('Note') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Action') }}</th>
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
