@extends('adminlte::page')

@section('title', __('Universities'))

@section('content_header')
<h1>{{ __('Roles') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('University') }} {{ $university->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-sm-1 mb-3">
                <a href="{{ route('university.create') }}" class="btn btn-block bg-gradient-primary" title="{{ __('Add') }}"><i
                        class="fas fa-pencil"></i></a>
            </div>
            <table id="example2" class="table table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Code') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Note') }}</th>
                        <th>{{ __('Slug') }}</th>
                        <th>{{ __('Created At') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>{{ $university->present()->id() }}</td>
                        <td>{{ $university->present()->code() }}</td>
                        <td>{{ $university->present()->name() }}</td>
                        <td>{!! $university->present()->status() !!}</td>
                        <td>{{ $university->present()->note() }}</td>
                        <td>{{ $university->present()->slug() }}</td>
                        <td>{{ $university->present()->createdAt() }}</td>
                        <td>
                            <form action="{{ route('university.destroy', $university) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {!! $university->present()->actionButtons() !!}
                            </form>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Code') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Note') }}</th>
                        <th>{{ __('Slug') }}</th>
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
    $(function () {
        $('#example2').DataTable({
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            // "processing": true,
            // "serverSide": true,
            // "ajax": '{{ route("role.index") }}',
            // "columns": [
            //     {data: 'id', name: 'id'},
            //     {data: 'name', name: 'name'},
            //     {data: 'display_name', name: 'display_name'},
            //     {data: 'note', name: 'note'},
            //     {data: 'created_at', name: 'created_at'},
            //     {
            //         data: 'action',
            //         name: 'action',
            //         orderable: true,
            //         searchable: true
            //     },
            // ]
        });
    });
</script>
@stop
