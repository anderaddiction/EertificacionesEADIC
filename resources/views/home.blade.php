@extends('layouts.app')
@section('content_header')

    <!-- Hotjar Tracking Code for https://eadic.org/secretaria_academica/public/oficina-virtual/oficina-virtual -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 3591928,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

    Eadic | Secretaría Académica
    https://eadic.org


@stop
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header ">
                        <h4>{{ __('¿Conoce el status de tu diploma y/o certificado de notas?') }}</h4>
                    </div>
                    {{-- <form class="form-horizontal" method="POST" action="{{ route('consulta.find') }}" id="seach-form"
                    name="seach-form" rol="form">
                    @csrf --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="title p-2">
                                <h4>¿Tienes número de ticket de solicitud de trámite?</h4>
                                <p class="text-justify">Recuerda que tu número de ticket es el que creaste en nuestra
                                    plataforma Soporte EADIC, donde adjuntaste el justificante
                                    de pago para iniciar con el trámite de diploma.</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ticket_diplomaynotas" class="col-sm-2 col-form-label">Cuéntanos:</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="custom-select form-control-border" id="response" name="response">
                                        <option>{{ __('Select an option') }}</option>
                                        <option value="1">{{ __('Yes') }}</option>
                                        <option value="0">{{ __('No') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="consequence">
                            <div class="search-ticket" style="display:none">
                                <div class="row">
                                    <div class="col">
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">×</button>
                                                <h5><i class="icon fas fa-ban"></i> {{ __('Alert!') }}</h5>
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('consulta.find') }}"
                                    id="seach-form" name="seach-form" rol="form">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="ticket_diplomaynotas" class="col-sm-2 col-form-label">Número de
                                            ticket:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-border"
                                                id="ticket_diplomaynotas" name="ticket_diplomaynotas"
                                                placeholder="{{ __('Enter ticket number here...') }}"
                                                value="{{ old('ticket_diplomaynotas') }}">
                                            <small
                                                class="text-danger"><i>{{ $errors->first('ticket_diplomaynotas') }}</i></small>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <button type="submit"
                                                class="btn btn-block btn-info">{{ __('Send') }}</button>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </form>
                                <div class="disclaimer p-4 text-justify">
                                    <p>El número de ticket no es lo mismo al número de pedido de cuando realizaste el pago
                                        en nuestra página web de Secretaría.</p>
                                    <p>El número de ticket es el que creaste en nuestro <span
                                            class="text-danger"><strong>Centro de Soporte</strong></span> para indicarnos
                                        tus datos personales, datos del
                                        máster, dirección de envío y donde adjuntaste el justificante de pago del trámite.
                                    </p>
                                </div>
                            </div>
                            <div class="show-iframe" style="display:none">
                                <div class="row text-justify">
                                    <div class="col-sm-12">
                                        <p>Tal como te informamos en el correo de trámites de diploma y en
                                            nuestra página web de Secretaría, si realizas el pago, pero no generas el ticket
                                            de solicitud, el trámite no se
                                            iniciará. Es indispensable crear correctamente el ticket con los datos de envío
                                            completos.</p>
                                        <p class="justify text-danger"><i><strong>Importante</strong>: El número de ticket
                                                no es lo mismo al número de pedido de cuando realizaste el pago en nuestra
                                                página web de
                                                Secretaría.</i></p>
                                        <p>Antes de dirigirte a la opción “Crear un ticket”, debes estar seguro de lo
                                            siguiente:</p>
                                        <ol>
                                            <li>Haber realizado el pago de trámite de diploma en nuestra página web de
                                                Secretaría.</li>
                                            <li>Tener la captura de pantalla del justificante de pago.</li>
                                            <li>Tener todos los datos de envío completos.</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-6 mt-3 text-center">
                                        <a href="https://soporte.eadic.biz/" target="_BLANK"
                                            class="col-sm-6 btn btn-block btn-success">{{ __('Create a ticket') }}</a>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                                {{-- <div class="disclaimer p-4 text-justify">
                                    <p>Por favor, ingresa el número de ticket que creaste en nuestra plataforma Soporte EADIC,
                                        donde adjuntaste el justificante
                                        de pago para iniciar con el trámite de diploma.</p>

                                    <p>En caso de haber realizado el pago, pero no has creado dicho ticket, por favor, ingresa a
                                        Soporte EADIC
                                        <a href="http://soporte.eadic.biz/open.php" target="_BLANK">http://soporte.eadic.biz/open.php</a>, seleccionas
                                        el Help
                                        Topic/Tema de ayuda, correspondiente al trámite que deseas,
                                        completa los campos requeridos y adjuntas (en el área sombreada que dice Drop files here
                                        or choose them) el comprobante
                                        de pago.
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{-- <button type="submit" class="btn btn-info">{{ __('Send') }}</button>
                        <button type="button" class="btn btn-default float-right">{{ __('Cancel') }}</button> --}}
                    </div>
                    <!-- /.card-footer -->
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        //Variables
        const response = document.querySelector('#response');
        const consequence = document.querySelector('.consequence');
        const searchTicket = document.querySelector('.search-ticket');
        const showIframe = document.querySelector('.show-iframe');
        //Events
        response.addEventListener('change', setResponse);


        //Functions
        function setResponse() {
            if (response.value == 1) {
                searchTicket.style.display = 'block';
                showIframe.style.display = 'none';
            } else if (response.value == 0) {
                console.log(response.value);
                searchTicket.style.display = 'none';
                showIframe.style.display = 'block';
            }
        }
    </script>
@endsection
