@extends('adminlte::page')

@section('title', __('Role Update'))

@section('content_header')
<h1>{{ __('Users') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form action="{{ route('user.update', $user) }}" method="POST" id="form-register" rol="form">
        @method('PUT')
        @include('auth.users._form', ['btnText' => __('Update'), 'title' => __('Update User Form')])
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
    });
</script>
@stop
