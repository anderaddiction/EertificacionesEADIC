@extends('layouts.app')

@section('content_header')
<h1>Estado de Trámite de Diploma</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">{{ __('Conoce el status de tu diploma y/o certificado de notas') }}</div>
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">DNI</label>
                    <div class="col-sm-4">
                        @if(empty($results[0]))
                        <input type="email" class="form-control" disabled id="inputEmail3" placeholder="Email"
                            data-ddg-inputtype="credentials.username" value="{{ $dni }}">
                        @else
                        <input type="email" class="form-control" disabled id="inputEmail3" placeholder="Email"
                            data-ddg-inputtype="credentials.username" value="{{ $results[0]->dni }}">
                        @endif

                    </div>
                </div>
                    <div class="row pt-3">
                        <div class="col-sm-12">
                            @if ($dni_result)
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>Alumno</h3>
                                            <p>Matriculado</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-secondary">
                                        <div class="inner">
                                            <h3>Alumno<sup style="font-size: 20px"></sup></h3>
                                            <p>No Matriculado</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-close"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-secondary">
                                        <div class="inner">
                                            <h3>Alumno<sup style="font-size: 20px"></sup></h3>
                                            <p>Pendiente de Matricular</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-warning"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @elseif(empty($dni_result))
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-secondary">
                                        <div class="inner">
                                            <h3>Alumno</h3>
                                            <p>Matriculado</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>Alumno<sup style="font-size: 20px"></sup></h3>
                                            <p>No Matriculado</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-close"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-secondary">
                                        <div class="inner">
                                            <h3>Alumno<sup style="font-size: 20px"></sup></h3>
                                            <p>Pendiente de Matricular</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-warning"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- @php
                        echo "<pre>";
                            print_r($results[0]->categoria_id);
                        echo "</pre>";
                    @endphp --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
