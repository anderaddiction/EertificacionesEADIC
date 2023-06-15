@extends('adminlte::page')

@section('title', __('Users'))

@section('content_header')
<h1>{{ __('Users') }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <!-- DATATABLE EXAMPLE -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Users Table') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-sm-1 mb-3">
                    <a href="{{ route('user.create') }}" class="btn btn-block bg-gradient-primary" title="{{ __('Add') }}"><i
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
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->present()->id() }}</td>
                                <td>{{ $user->present()->name() }}</td>
                                <td>{{ $user->present()->email() }}</td>
                                <td>{{ $user->present()->role() }}</td>
                                <td>{{ $user->present()->createdAt() }}</td>
                                <td>
                                    <form action="{{ route('user.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {!! $user->present()->actionButtons() !!}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Role') }}</th>
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
