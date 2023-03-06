@extends('adminlte::page')

@section('title', __('Category Update'))

@section('content_header')
<h1>{{ __('Roles') }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form action="{{ route('category.update', $category) }}" method="POST" id="form-register" rol="form">
        @method('PUT')
        @include('auth.categories._form', ['btnText' => __('Update'), 'title' => __('Update Category Form')])
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
