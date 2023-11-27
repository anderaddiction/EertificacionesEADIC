<title> {{ $datosDeMatricula->nombre }}_{{ $datosDeMatricula->documento_de_identidad }}</title>

<style>
    body {
        font-size: 14px;
        text-align: justify;
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
        background-color: #808080;
        color: white;
        font-size: 12.5px;
    }

    .color {
        color: #006c97;
        background-color: #ececec;
        width: 100%;
        height: 15px;
        margin-bottom: 5px;
        padding: 0;
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
                            <img src="img/udima_logo.png" alt="logo {{ $datosDeMatricula->university->name }}"
                                width="150px" style="float: right;">
                        @elseif ($datosDeMatricula->university->name == 'UCAM')
                            <img src="img/ucam_logo.png" alt="logo {{ $datosDeMatricula->university->name }}"
                                width="150px" style="float: right; padding-right: 30px; ">
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


    <div style=" text-align: center; padding-bottom: 10px; font-weight:700; text-transform:uppercase; font-size: 20px;">
        CERTIFICA</div>



    <div
        style="width: 80%; text-align: justify;  display: flex;
        text-align: justify;
        justify-content: center;
        align-items: center;">
        Que D./Dña. {{ $datosDeMatricula->nombre }}, con nº documento identidad
        {{ $datosDeMatricula->documento_de_identidad }}, ha finalizado exitosamente
        el <b>{{ $datosDeMatricula->master->name }}</b> en su modalidad de estudio
        {{ $datosDeMatricula->modalidad_de_estudio }} desde el {{ $datosDeMatricula->fecha_inicio }} hasta el
        {{ $datosDeMatricula->fecha_fin }}, impartido por EADIC
        junto con la {{ $datosDeMatricula->university->name }}. A la
        fecha ha obtenido las calificaciones a continuación y se encuentra a la espera de la emisión del diploma por
        parte de la universidad:
    </div>



    <table
        style="font-size: 11px; border-collapse: collapse; width: 700px; margin: 0 auto; text-align: center; padding: 0 60px;  ">
        <thead>
            <tr>
                <th style="border: 2px solid black; padding: 8px; text-align: center;" width="300px">Nombre de la
                    asignatura o módulo</th>
                <th style="border: 2px solid black; padding: 8px; text-align: center;" colspan="3">Notas obtenidas
                </th>
                <th style="border: 2px solid black; padding: 8px; text-align: center;" width="25px">Créditos
                    ECTS*</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                @for ($i = 1; $i <= 9; $i++)
                    <tr>
                        <!-- Asignatura -->
                        <td
                            style="border: 2px solid #2596be; padding: 0; text-align: center; background-color: #ececec; margin:0;">
                            <?php
                            $codigo = $nota["asignaturas_$i"];
                            $asignaturaConsulta = DB::table('asignatura')
                                ->where('code', $codigo)
                                ->first();
                            ?>
                            {{ $asignaturaConsulta ? $asignaturaConsulta->nombre : 'No encontrado' }}
                        </td>
                        <!-- Notas obtenidas -->
                        <td style="border: 2px solid #2596be; padding: 0; text-align: center;">
                            <div class="color">Total Módulo {{ $i }}</div>
                            <hr style="margin: 0; padding: 0; border: none; border-top: 2px solid black; width: 100%;">
                            {{ $nota["modulos_$i"] }}
                        </td>
                        <td style="border: 2px solid #2596be; padding: 0; text-align: center;">
                            <div class="color">Estado M {{ $i }}</div>
                            <hr style="margin: 0; padding: 0; border: none; border-top: 2px solid black; width: 100%;">
                            <div style="color: #053a00;
        background-color: #00c21a8c;">
                                {{ $nota["estado_$i"] }}
                            </div>

                        </td>
                        <td style="border: 2px solid #2596be; padding: 0; text-align: center;">
                            <div class="color">Baremo {{ $i }}</div>
                            <hr style="margin: 0; padding: 0; border: none; border-top: 2px solid black; width: 100%;">
                            {{ $nota["baremos_$i"] }}
                        </td>
                        <!-- Créditos -->
                        <td
                            style="border: 2px solid #2596be; padding: 0; text-align: center; background-color: #ececec;">
                            <p>{{ $asignaturaConsulta ? $asignaturaConsulta->creditos : 'No encontrado' }}</p>
                        </td>
                    </tr>
                @endfor
            @endforeach
        </tbody>
    </table>



    <p style="font-size: 9px; text-aling:start; padding: 0 60px; ">*Cada crédito corresponde a un total de 25 horas</p>

    <p style="padding: 0 80px; ">Y para que así conste a los efectos oportunos firmo el presente en Madrid.</p>

    <p style="padding: 0 80px; color: #525252; font-size: 14px;"> Lina Santamaría
    </p>
    <p style="padding: 0 80px; color: #525252; font-size: 10px;"> Departamento de Formación
    </p>
    <img src="img/eadic_logo.png" alt="logo" width="120px" style=" border: none; padding: 0 80px;">
    <p style="padding: 0 80px; color: #525252; font-size: 10px;"> Oficina: +34 913 930 319</p>

    <hr style="margin: 0 80px; float: left; color: #c7c7c796; width:120px;">

    <br>
    <p style="padding: 0 80px; color: #525252; font-size: 10px;"> Calle Medea 4
    </p>
    <p style="padding: 0 80px; color: #525252; font-size: 10px;">28037 Madrid</p>
    <p><a style="padding: 0 80px; font-size: 12px;" href="mailto:lina.santamaria@eadic.es">lina.santamaria@eadic.es</a>
    </p>
    <p>
        <a style="padding: 0 80px; font-size: 12px;" href="http://www.eadic.com/">www.eadic.com</a>
    </p>
    <img src="img/footer-pdf.PNG" class="hf-img2">
</body>

</html>
