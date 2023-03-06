@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>{{ __('Roles') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form action="{{ route('role.store') }}" method="POST" id="form-register" rol="form">
        @include('auth.roles._form', ['btnText' => __('Send'), 'title' => __('Register User Form')])
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
