@extends('layouts.app')

@section('content_header')
<h1>Trámites</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header ">
                    <h4>{{ __('Conoce el status de tu diploma y/o certificado de notas') }}</h4>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('consulta.find') }}" id="seach-form" name="seach-form" rol="form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{-- <p><i class="icon fas fa-ban"></i></p> --}}
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ticket_diplomaynotas" class="col-sm-2 col-form-label">Número de ticket:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-border" id="ticket_diplomaynotas" name="ticket_diplomaynotas"
                                    placeholder="{{ __('Enter ticket number here...') }}" value="{{ old('ticket_diplomaynotas') }}">
                                <small class="text-danger"><i>{{ $errors->first('ticket_diplomaynotas') }}</i></small>
                            </div>
                        </div>
                        {{-- <div class="disclaimer p-4 text-justify">
                            <p>Por favor, ingresa el número de ticket que creaste en nuestra plataforma Soporte EADIC, donde adjuntaste el justificante
                            de pago para iniciar con el trámite de diploma.</p>

                            <p>En caso de haber realizado el pago, pero no has creado dicho ticket, por favor, ingresa a Soporte EADIC
                            <a href="http://soporte.eadic.biz/open.php" target="_BLANK">http://soporte.eadic.biz/open.php</a>, seleccionas el Help Topic/Tema de ayuda, correspondiente al trámite que deseas,
                            completa los campos requeridos y adjuntas (en el área sombreada que dice Drop files here or choose them) el comprobante
                            de pago.</p>
                        </div> --}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">{{ __('Send') }}</button>
                        <button type="button" class="btn btn-default float-right">{{ __('Cancel') }}</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
