@extends('layouts.app')

@section('content_header')
<h1>Trámites</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('Descarga el certificado de alumno activo') }}</h6>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
                        </div>
                            @if ($user->universidad_espanola === 'UDIMA')
                                <h6>Certificado UDIMA de {{ $user->oportunidades_nombre_contacto }}</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque consectetur corporis deleniti dolore fugit incidunt
                                    magni nam, nesciunt nisi pariatur perferendis quam qui quisquam sit velit? Aspernatur debitis dolore maiores!</p>
                                </body>

                                </html>
                            @else
                                <h6>Certificado UCAM de {{ $user->oportunidades_nombre_contacto }}</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque consectetur corporis deleniti dolore fugit incidunt
                                    magni nam, nesciunt nisi pariatur perferendis quam qui quisquam sit velit? Aspernatur debitis dolore maiores!</p>
                                </body>

                                </html>
                            @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                        <button type="button" class="btn btn-default float-right">{{ __('Cancel') }}</button>
                    </div>
                    <!-- /.card-footer -->
            </div>
        </div>
    </div>
</div>
@endsection
