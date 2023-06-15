@extends('adminlte::page')

@section('title', __('Categories'))

@section('content_header')
<h1>{{ __('Categories') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form action="{{ route('category.store') }}" method="POST" id="form-register" rol="form">
        @include('auth.categories._form', ['btnText' => __('Send'), 'title' => __('Register Category Form')])
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
