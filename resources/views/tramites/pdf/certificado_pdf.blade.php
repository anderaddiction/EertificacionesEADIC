<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/android-icon-192x192.png') }}">
    <link rel="manifest" crossorigin="use-credentials" href="{{ asset('favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}"> --}}

</head>
<body>
    <div class="container" style="padding: 4%">
        <div class="row">
            <div class="col-12">
                <div class="contenedor-flexbox">
                    <div style="width:50%; display:inline-block">
                        <div class="eadic-logo" >
                            <img src="{{ public_path('img/eadic_logo.png') }}" width="45%" alt="eadic-logo">
                        </div>
                    </div>
                    <div style="width:50%; display:inline-block">
                        <div class="universidad_logo justify-content-end" >
                            @if ($user->universidad_espanola == 'Universidad a Distancia de Madrid (UDIMA)')
                                <div class="udima" style="margin:-20% -130% 0 150%">
                                    <img src="{{ public_path('img/udima_log.png') }}" width="45%" height="80px" alt="udima-logo">
                                </div>
                            @elseif ($user->universidad_espanola == 'Universidad Católica San Antonio de Murcia (UCAM)')
                                <div class="ucam" style="margin:-20% -130% 0 150%">
                                    <img src="{{ public_path('img/ucam_logo.png') }}" width="45%" height="80px" alt="ucam-logo">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row" style="margin:18% 0 0 0">
                    @if ($user->universidad_espanola)
                    <div class="col-12" style="font-size:16px">
                        <p style="font-size:13px">LINA LIZBETH SANTAMARÍA GUTIÉRREZ, Responsable del Departamento de Formación de la Escuela Abierta en
                        Desarrollo de Ingeniería y Construcción SL (EADIC SL)</p>
                        <h4 style="text-align: center; margin:10% 0 10% 0;">CERTIFICA</h4>
                        <p style="font-size:13px">Que D./Dña. <strong>{{ $user->oportunidades_nombre_contacto }}</strong>, con nº documento identidad <strong>{{ $user->contactos_n_identificacion }}</strong>
                        , es alumno activo del <strong>{{ $user->nombre_producto }}</strong> impartido por EADIC, junto con la <strong>{{ $user->universidad_espanola }}</strong>. Bajo la modalidad <strong>{{ $user->modalidad_de_estudio }}</strong> desde el día <strong>{{ $user->inicio_edicion
                            }}</strong> hasta <strong>{{ $user->fin_de_edicion }}</strong></p>
                        <p style="font-size:13px; margin:10% 0 0 0;">Y para que así conste a los efectos oportunos firmo el presente en Madrid.
                        </p>
                        <p style="font-size:13px; margin:5% 0 0 0;">NOTA: el presente certificado sólo tiene vigencia de 30 días a partir de la fecha {{ \Carbon\Carbon::now()->format('d-m-y') }} en que ha sido firmado digitalmente
                        </p>
                    </div>
                    @else
                    <div class="col-12" style="font-size:16px">
                        <p style="font-size:13px">LINA LIZBETH SANTAMARÍA GUTIÉRREZ, Responsable del Departamento de Formación de la Escuela
                            Abierta en
                            Desarrollo de Ingeniería y Construcción SL (EADIC SL)</p>
                        <h4 style="text-align: center; margin:10% 0 10% 0;">CERTIFICA</h4>
                        <p style="font-size:13px">Que D./Dña. <strong>{{ $user->oportunidades_nombre_contacto }}</strong>, con nº documento
                            identidad <strong>{{ $user->contactos_n_identificacion }}</strong>
                            , es alumno activo del <strong>{{ $user->nombre_producto }}</strong> impartido por EADIC. Bajo la modalidad <strong>{{ $user->modalidad_de_estudio }}</strong> desde el día <strong>{{ $user->inicio_edicion
                                }}</strong> hasta <strong>{{ $user->fin_de_edicion }}</strong></p>
                        <p style="font-size:13px; margin:10% 0 0 0;">Y para que así conste a los efectos oportunos firmo el presente en
                            Madrid.
                        </p>
                        <p style="font-size:13px; margin:5% 0 0 0;">NOTA: el presente certificado sólo tiene vigencia de 30 días a partir de
                            la fecha {{ \Carbon\Carbon::now()->format('d-m-y') }} en que ha sido firmado digitalmente
                        </p>
                    </div>
                    @endif
                </div>
                <div class="row" style="margin:10% 0 0 0">
                    <div class="firma">
                        <p style="font-size: 13px; color:grey">
                            Lina Santamaria<br>
                            Departamento de Formación<br>
                            Oficina: +34 913 930 319<br>
                        </p>
                        <hr style="border-top: dashed grey; margin:3% 0 3% 0; width:20%">
                        <img src="{{ public_path('img/eadic_logo.png') }}" width="15%" alt="eadic-forma">
                        <p style="font-size: 13px; color:grey">
                            Calle Medea 4<br>
                            28037 Madrid<br>
                            lina.santamaria@eadic.es<br>
                            www.eadic.com<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script> --}}
    </body>
</body>
</html>
