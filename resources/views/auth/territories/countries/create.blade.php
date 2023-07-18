@extends('adminlte::page')

@section('title', __('Countries'))

@section('content_header')
<h1>{{ __('Countries') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    @if (session()->has('success'))
    <div class="alert bg-teal alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h6><i class="icon fas fa-check"></i> {{ session('success') }}</h6>
    </div>
    @endif
    <form action="{{ route('country.store') }}" method="POST" id="form-register" rol="form">
        @include('auth.territories.countries._form', ['btnText' => __('Send'), 'title' => __('Register Country Form')])
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
