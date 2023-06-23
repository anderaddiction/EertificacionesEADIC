@extends('layouts.app')

@section('content_header')
<h1 class="text-primary">Asesoramiento Personalizado</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="recuadro" id="horario-activo" style="none">
                        <div class="row">
                            <div class="col">
                                <div class="dot">
                                    <img class="blinking-dot" src="{{ asset("img/icons/blinking-dot.gif") }}"  alt="Blinking Dot">
                                </div>
                            </div>
                        </div>
                        <div class="row pl-4 pr-4 pb-4 text-center">
                            <div class="col">
                                <div class="header">
                                    <h4 class="text-primary">Estamos disponibles para ti</h4>
                                    <p>Horario de atención: Lunes a viernes de <br> 15:00 a 23:59 hora España</p>
                                </div>
                                <div class="button-link">
                                    <a href="https://us06web.zoom.us/j/85204356189" target="_BLANK" class="btn btn-primary link-button">Iniciar llamada</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recuadro mt-4" id="horario-inactivo" style="display:block">
                        <div class="row">
                            <div class="col">
                                <div class="dot">
                                    <img class="blinking-dot" src="{{ asset("img/icons/disabled_dot.gif") }}" alt="Blinking Dot">
                                </div>
                            </div>
                        </div>
                        <div class="row pl-4 pr-4 pb-4 text-center">
                            <div class="col">
                                <div class="header">
                                    <h4 class="text-primary">En estos momentos no podemos atenderte</h4>
                                    <p>Horario de atención: Lunes a viernes de <br> 15:00 a 23:59 hora España</p>
                                </div>
                                <div class="button-link">
                                    <a href="{{ route('cita-telefonica') }}" class="btn btn-primary link-button">Agendar una cita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    .container{
        position: relative;
    }
    .recuadro{
        position: absolute;
        left: 50%;
        right: -50%;
        border: 2px solid #000000;
        border-style: dashed;
        border-radius: 20px
    }
    .blinking-dot{
        width: 10%
    }

    .link-button{
        padding: 2% 6%;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
    }
</style>
@endsection
@section('js')
<script>
    //variables
    const currentTime = new Date();
    const horaActual = currentTime.getHours()+':'+currentTime.getMinutes();
    const horarioActivo = document.querySelector('#horario-activo');
    const horarioInactivo = document.querySelector('#horario-inactivo');

    habilitarPorHorarios();

    //Funciones
    function habilitarPorHorarios() {
        if ((horaActual >= '9:00') && (horaActual <= '18:59')) {
            horarioInactivo.style.display='',
            horarioActivo.style.display='none' ;
        }else{
            horarioInactivo.style.display='none',
            horarioActivo.style.display='' ;
        }
    }

</script>
@endsection
