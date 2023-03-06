@extends('adminlte::page')

@section('title', __('Users'))

@section('content_header')
<h1>{{ __('Users') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form action="{{ route('user.store') }}" method="POST" id="form-register" rol="form">
        @include('auth.users._form', ['btnText' => __('Send'), 'title' => __('Register User Form')])
    </form>user
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
    });
</script>
@stop
