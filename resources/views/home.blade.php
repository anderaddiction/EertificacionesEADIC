@extends('layouts.app')

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
                                <h4>¿Tienes tú número de ticket?</h4>
                                <p class="text-justify">Recuerda que tu número de ticket es el que creaste en nuestra plataforma Soporte EADIC, donde adjuntaste el justificante
                                de pago para iniciar con el trámite de diploma.</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ticket_diplomaynotas" class="col-sm-2 col-form-label">Cuéntanos:</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="custom-select form-control-border" id="response" name="response">
                                        <option >{{ __('Select an option') }}</option>
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
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-ban"></i> {{ __('Alert!') }}</h5>
                                            {{ session('error') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('consulta.find') }}" id="seach-form" name="seach-form"
                                    rol="form">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="ticket_diplomaynotas" class="col-sm-2 col-form-label">Número de ticket:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-border" id="ticket_diplomaynotas" name="ticket_diplomaynotas" placeholder="{{ __('Enter ticket number here...') }}" value="{{ old('ticket_diplomaynotas') }}">
                                            <small class="text-danger"><i>{{ $errors->first('ticket_diplomaynotas') }}</i></small>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-block btn-info">{{ __('Send') }}</button>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </form>
                                <div class="disclaimer p-4 text-justify">
                                    <p>Por favor, ingresa el número de ticket que creaste en nuestra plataforma Soporte EADIC, donde adjuntaste el
                                        justificante
                                        de pago para iniciar con el trámite de diploma.</p>

                                    <p>En caso de haber realizado el pago, pero no has creado dicho ticket, por favor, ingresa a Soporte EADIC
                                        <a href="http://soporte.eadic.biz/open.php" target="_BLANK">http://soporte.eadic.biz/open.php</a>, seleccionas
                                        el Help Topic/Tema de ayuda, correspondiente al trámite que deseas,
                                        completa los campos requeridos y adjuntas (en el área sombreada que dice Drop files here or choose them) el
                                        comprobante
                                        de pago.
                                    </p>
                                </div>
                            </div>
                            <div class="show-iframe" style="display:none">
                                <div class="row text-center">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <a href="https://soporte.eadic.biz/" target="_BLANK" class="btn btn-block btn-success">{{ __('Create a ticket') }}</a>
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
        }else if (response.value == 0){
            console.log(response.value);
            searchTicket.style.display = 'none';
            showIframe.style.display = 'block';
        }
     }

</script>
@endsection
