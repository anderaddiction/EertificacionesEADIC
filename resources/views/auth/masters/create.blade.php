@extends('adminlte::page')

@section('title', __('Master'))

@section('content_header')
<h1>{{ __('Master') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form action="{{ route('master.store') }}" method="POST" id="form-register" rol="form">
        @include('auth.masters._form', ['btnText' => __('Send'), 'title' => __('Register Master Form')])
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
