@extends('adminlte::page')

@section('title', __('Certificate State'))

@section('content_header')
<h1>{{ __('Certificate State') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form action="{{ route('certificate_status.store') }}" method="POST" id="form-register" rol="form">
        @include('auth.certificate_state._form', ['btnText' => __('Send'), 'title' => __('Register Certificate State Form')])
    </form>
</div>

@stop

@section('plugins.Select2', true)

@section('css')
{{-- Here your customs css --}}
@stop

@section('js')
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    });
</script>
@stop
