<title> {{ $datosDeMatricula->nombre }}_{{ $datosDeMatricula->documento_de_identidad }}</title>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
        text-align: justify;

        background: url("{{ public_path('img/fondo.png') }}");

        background-size: cover cover;

        -webkit-print-color-adjust: exact;
        width: 100vw;
        height: 100vh;
        margin: 0px;
    }



    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #0a4e96;
        color: white;
        font-size: 12.5px;
    }

    .color {
        color: #ffffff;
        background-color: #b0b6bc;
        width: 100%;
        height: 15px;

        padding: 0;
        padding-bottom: 5px;

    }

    .hf-img {
        position: absolute;
        width: 830px;
        height: 50px;
        z-index: -1;
        margin-left: -60px;
        margin-top: -60px;
    }

    .hf-img2 {

        width: 830px;
        height: 25px;
        z-index: -1;
        position: absolute;
        bottom: 0;
        margin-left: -60px;
        margin-bottom: -60px;
    }

    .LI-Certifica {
        width: 80%;
        margin: 0 auto;
        display: flex;
        text-align: justify;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

    .img-linea {
        position: absolute;
        width: 270px;
        margin-left: -50px;

    }

    .r-table {
        position: absolute;
        width: 30px;
        height: 375.5px;
        margin-left: -20px;
        margin-top: 15px;

    }
</style>

<body>

    <img src="img/head-pdf.PNG" class="hf-img">
    <div class="container">
        <table width="100%" style=" border: none">
            <tr>
                <td style="text-align: left; width: 50%;">
                    <img src="img/eadic_logo.png" alt="logo" width="200px" style=" border: none margin-left: 60px;">
                </td>
                <td style="text-align: right; "style=" border: none">
                    @if ($datosDeMatricula->university)
                        @if ($datosDeMatricula->university->name == 'UDIMA')
                            <img src="{{ asset('img/udima_log.png') }}"
                                alt="logo {{ $datosDeMatricula->university->name }}" width="150px"
                                style="float: right;">
                        @elseif ($datosDeMatricula->university->name == 'UCAM')
                            <img src="{{ asset('img/ucam_logo.png') }}"
                                alt="logo {{ $datosDeMatricula->university->name }}" width="150px"
                                style="float: right; padding-right: 30px; ">
                        @endif
                    @else
                        No hay universidad disponible
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="LI-Certifica"><b>LINA LIZBETH SANTAMARÍA GUTIÉRREZ</b>,
        Responsable del
        Departamento de Formación dela Escuela Abierta en Desarrollo de Ingeniería y Construcción SL (EADIC SL).
    </div>

    <img src="img/linea.png" alt="" class="img-linea">
    <div style=" text-align: center; padding-bottom: 10px; font-weight:400; text-transform:uppercase; font-size: 35px;">
        CERTIFICA</div>



    <div
        style="
        width: 100%;
        margin: 0 auto;
        display: flex;
        text-align: justify;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
         margin-top: 15px;
        ">
        Que D./Dña. {{ $datosDeMatricula->nombre }}, con nº documento identidad
        {{ $datosDeMatricula->documento_de_identidad }}, ha finalizado exitosamente
        el <b>{{ $datosDeMatricula->master->name }}</b> en su modalidad de estudio
        {{ $datosDeMatricula->modalidad_de_estudio }} desde el {{ $datosDeMatricula->fecha_inicio }} hasta el
        {{ $datosDeMatricula->fecha_fin }}, impartido por EADIC
        junto con la {{ $datosDeMatricula->university->name }}. A la
        fecha ha obtenido las calificaciones a continuación y se encuentra a la espera de la emisión del diploma por
        parte de la universidad:
    </div>

    <img src="img/r-table.PNG" class="r-table">
    <table
        style="font-size: 11px; border-collapse: collapse; width: 850px; margin: 0 auto; text-align: center; padding: 0 60px;    margin-left: -60px; margin-bottom: 15px;
         margin-top: 15px;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: center;" width="300px">Nombre de la
                    asignatura o módulo</th>
                <th style="border: 1px solid black; padding: 8px; text-align: center;" colspan="3">Notas obtenidas
                </th>
                <th style="border: 1px solid black; padding: 8px; text-align: center;" width="25px">Créditos
                    ECTS*</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                @for ($i = 1; $i <= 9; $i++)
                    <tr>
                        <!-- Asignatura -->
                        <td style="border: 1px solid black; padding: 0; text-align: center;  margin:0;">
                            <?php
                            $codigo = $nota["asignaturas_$i"];
                            $asignaturaConsulta = DB::table('asignatura')
                                ->where('code', $codigo)
                                ->first();
                            ?>
                            {{ $asignaturaConsulta ? $asignaturaConsulta->nombre : 'No encontrado' }}
                        </td>
                        <!-- Notas obtenidas -->
                        <td style="border: 1px solid black; padding: 0; text-align: center;">
                            <div class="color">Total Módulo {{ $i }}</div>
                            <hr style="margin: 0; padding: 0; border: none; border-top: 1px solid black; width: 100%;">
                            {{ $nota["modulos_$i"] }}
                        </td>
                        <td style="border: 1px solid black; padding: 0; text-align: center;">
                            <div class="color">Estado M {{ $i }}</div>
                            <hr style="margin: 0; padding: 0; border: none; border-top: 1px solid black; width: 100%;">
                            <div style="color: #020202;
        background-color: #41c9e8;">
                                {{ $nota["estado_$i"] }}
                            </div>

                        </td>
                        <td style="border: 1px solid black; padding: 0; text-align: center;">
                            <div class="color">Baremo {{ $i }}</div>
                            <hr style="margin: 0; padding: 0; border: none; border-top: 1px solid black; width: 100%;">
                            {{ $nota["baremos_$i"] }}
                        </td>
                        <!-- Créditos -->
                        <td style="border: 1px solid black; padding: 0; text-align: center; ">
                            <p>{{ $asignaturaConsulta ? $asignaturaConsulta->creditos : 'No encontrado' }}</p>
                        </td>
                    </tr>
                @endfor
            @endforeach
        </tbody>
    </table>



    <p style="font-size:10px; text-aling:start; padding: 0 50px;  margin-top: -15px;">*Cada crédito corresponde a
        un
        total de 25 horas
    </p>

    <p style="padding: 0 50px; ">Y para que así conste a los efectos oportunos firmo el presente en
        Madrid.</p>
    <p style="padding: 0 50px; color: #646464; font-size: 18px; margin-top: -5px; margin-bottom: -5px;"> - - - - - - - -
        - - - - - - - - - - - - - - - - - - -

    </p>
    <p style="padding: 0 50px; color: #3d3d3d; font-size: 18px;"> Lina Lizbeth Santamaría Gutiérrez

    </p>
    <p style="padding: 0 50px; color: #525252; font-size: 12px; font-weight:800; "> Departamento de Formación
    </p>
    <p style="padding: 0 50px; color: #525252; font-size: 12px;">
        Oficina: +34 913 930 319
    </p>
    <p style="padding: 0 50px; color: #525252; font-size: 12px;">
        Calle Medea 4, 28037
    </p>
    <p style="padding: 0 50px; color: #525252; font-size: 12px;">
        28037 - <b>Madrid, España</b></p>
    <p><a style="padding: 0 50px; font-size: 12px;" href="mailto:lina.santamaria@eadic.es">lina.santamaria@eadic.es</a>
    </p>
    <p>
        <a style="padding: 0 50px; font-size: 12px;" href="http://www.eadic.com/">www.eadic.com</a>
    </p>
    <img src="img/footer-pdf.PNG" class="hf-img2">
</body>

</html>
