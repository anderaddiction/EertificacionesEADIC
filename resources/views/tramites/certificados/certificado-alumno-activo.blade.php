
@extends('layouts.app')

@section('content_header')
<h1>Certificado de Alumno Activo</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('Descarga tu Certificado') }}</h6>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('certificado.find') }}" id="seach-form"
                    name="seach-form" rol="form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{-- <p><i class="icon fas fa-ban"></i></p> --}}
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ticket_diplomaynotas" class="col-sm-2 col-form-label">DNI:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-border" id="user_dni"
                                    name="user_dni" placeholder="Ingresa tu DNI aquí"
                                    value="{{ old('user_dni') }}">
                                <small class="text-danger"><i>{{ $errors->first('user_dni') }}</i></small>
                            </div>
                        </div>
                        {{-- <div class="disclaimer p-4 text-justify">
                            <p>Por favor, ingresa el número de ticket que creaste en nuestra plataforma Soporte EADIC,
                                donde adjuntaste el justificante
                                de pago para iniciar con el trámite de diploma.</p>

                            <p>En caso de haber realizado el pago, pero no has creado dicho ticket, por favor, ingresa a
                                Soporte EADIC
                                <a href="http://soporte.eadic.biz/open.php"
                                    target="_BLANK">http://soporte.eadic.biz/open.php</a>, seleccionas el Help
                                Topic/Tema de ayuda, correspondiente al trámite que deseas,
                                completa los campos requeridos y adjuntas (en el área sombreada que dice Drop files here
                                or choose them) el comprobante
                                de pago.
                            </p>
                        </div> --}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                        {{-- <button type="button" class="btn btn-default float-right">{{ __('Cancel') }}</button> --}}
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
