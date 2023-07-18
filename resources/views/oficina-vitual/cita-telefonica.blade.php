@extends('layouts.app')

@section('content_header')
<h1 class="text-primary">Solicitud Cita Telefónica</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Solicitud Cita Telefónica</h3>
                </div>
                <div class="card-body">
                    <div class="disclamer">
                        <p>¡Bienvenido a nuestro formulario de citas telefónicas para nuestra oficina virtual!</p>
                        <p>Detalle la hora de su preferencia (días de atención de lunes a viernes de 15:00pm a 23:59pm hora de España)</p>
                        <p>Al recibir su solicitud, validaremos nuestra disponibilidad y nos contactatremos en el horario descrito</p>
                    </div>
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Cita Agendada</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="formulario-cita-telefonica">
                        <form action="{{ route('agendar-cita-telefonica') }}" method="POST" id="cita-telefonica" rol="form" >
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="name">Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nombre" name="name" id="name">
                                        </div>
                                        <small id="name-error" class="error text-danger">{{ $errors->first('name') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="last_name">Apellido</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Apellido" name="last_name" id="last_name">
                                        </div>
                                        <small id="name-error" class="error text-danger">{{ $errors->first('last_name') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="telefono">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                        </div>
                                        <small id="email-error" class="error text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="telefono">Teléfono</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control" name="phone_code" id="phone_code">
                                                    @foreach ($paises as $code)
                                                    <option value="{{ $code->phone_code }}">{{ $code->phone_code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono">
                                        </div>
                                        <small id="telefono-error" class="error text-danger">{{ $errors->first('telefono') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="motivo_llamada">Motivo de la Llamada</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-question"></i></span>
                                            </div>
                                            <select class="form-control" name="motivo_llamada" id="motivo_llamada">
                                                <option value="">Seleccione una opcion</option>
                                                <option value="Problemas con Diploma">Problemas con Diploma</option>
                                                <option value="Problemas con notas">Problemas con notas</option>
                                                <option value="Incidencia con certificado de alumno activo">Incidencia con certificado de alumno activo
                                                </option>
                                                <option value="Incidencia con matriculacion universitaria">Incidencia con matriculacion universitaria
                                                </option>
                                                <option value="Ampliación de actividades">Ampliación de actividades</option>
                                                <option value="Dudas de la plataforma">Dudas de la plataforma</option>
                                                <option value="Dudas sobre el programa formativo">Dudas sobre el programa formativo</option>
                                                <option value="otros">otros</option>
                                            </select>
                                        </div>
                                        <small id="name-error" class="error text-danger">{{ $errors->first('motivo_llamada') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="horario">Hora</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <select class="form-control" name="horario" id="horario">
                                                <option value="">Seleccione una opcion</option>
                                                <option value="15:00 - 17:00 Hora España">15:00 - 17:00 Hora España</option>
                                                <option value="17:00 - 19:00 Hora España">17:00 - 19:00 Hora España</option>
                                                <option value="19:00 - 23:55 Hora España">19:00 - 23:55 Hora España</option>
                                            </select>
                                        </div>
                                        <small id="name-error" class="error text-danger">{{ $errors->first('horario') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="country">País</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                            </div>
                                            <select class="form-control" name="country" id="country">
                                                <option value="">Seleccione una opcion</option>
                                                @foreach ($paises as $country)
                                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <small id="name-error" class="error text-danger">{{ $errors->first('country') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Agendar una Cita</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="card-footer">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
