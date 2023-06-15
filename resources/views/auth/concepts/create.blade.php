@extends('adminlte::page')

@section('title', __('Concepts'))

@section('content_header')
<h1>{{ __('Concepts') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form action="{{ route('concept.store') }}" method="POST" id="form-register" rol="form">
        @include('auth.concepts._form', ['btnText' => __('Send'), 'title' => __('Register Concept Form')])
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
