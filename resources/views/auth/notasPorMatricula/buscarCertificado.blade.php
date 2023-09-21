@extends('adminlte::page')

@section('title', 'Buscar matricula')

@section('content_header')
    <h1>Buscar matricula</h1>
@stop

@section('content')
    @if (session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '{{ session('info') }}',
                    icon: 'success'
                });
            });
        </script>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Ingrese el DNI de la matricula.</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <form role="form" action="{{ route('notas-de-matricula.resultado.certificados') }}"
                                method="post">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group col-12">
                                        <label for="dni">Ingrese el DNI:</label>
                                        <input type="text" class="form-control" name="dni" id="dni" required>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
