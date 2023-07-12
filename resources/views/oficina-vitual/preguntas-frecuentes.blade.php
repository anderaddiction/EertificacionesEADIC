@extends('layouts.app')

@section('content_header')
<h1 class="text-primary">Preguntas Frecuentes</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Preguntas Frecuentes</h3>
                </div>
                <div class="card-body">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>FAQ EADIC</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                                        <li class="breadcrumb-item active">Preguntas Frecuentes</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="content">
                        <div class="row">
                            <div class="col-12" id="accordion">
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                1. Ahora que finalicé el máster, ¿Cuáles son los próximos pasos a seguir?
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <p>Debes esperar a recibir el correo de cierre de edición y reporte final de notas que se envía desde el correo
                                                electrónico de la Secretaría Académica de EADIC. En dicho correo se te indicará lo siguiente:</p>
                                            <ul>
                                                <li>Tiempo de verificación de notas finales.</li>
                                                <li>Fecha de cierre de plataforma.</li>
                                                <li>Proceso de emisión de diplomas (próximos correos y tiempos estimados).</li>
                                                <li>Solicitud de certificados provisionales (de culminación y notas).</li>
                                                <li>Rematriculación de módulos.</li>
                                                <li>Reporte final de notas.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                2. Ahora que finalicé el máster, ¿Cómo puedo solicitar un certificado de culminación y/o certificado de notas de EADIC?
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Debes realizar la solicitud a través del siguiente enlace: <a href="http://eadic.biz/soporte/open.php">http://eadic.biz/soporte/open.php</a>.</p>

                                            <p>Para ello debes seleccionar como tema de ayuda Certificado / A la espera del título ó Certificado / Notas
                                                provisional.</p>
                                            <p>En los detalles del mensaje debes incluir la siguiente información:</p>
                                            <ul>
                                                <li>Nombre y apellidos</li>
                                                <li>DNI</li>
                                                <li>Máster que se está cursando</li>
                                                <li>Correo</li>
                                            </ul>

                                            <p>
                                                <trong>
                                                    Nota: Para solicitar alguno de estos certificados, debiste haber recibido el correo de Cierre de Edición y
                                                    Reporte Final
                                                    de Notas
                                                </trong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree"
                                        aria-expanded="false">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                3. No he finalizado el máster, pero necesito un certificado provisional de notas que tengo hasta el momento. ¿Cómo lo puedo
                                                obtener?
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Generalmente, el certificado provisional de notas se emite al finalizar el máster. En caso de que lo necesites para
                                            algún trámite, debes escribir a <span class="text-primary">atencionalumno@eadic.es</span> , explicando en detalle tu situación para poder tramitarlo.
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                4. Rematriculé algunos módulos pendientes, pero no me han enviado ninguna información sobre cómo obtener el diploma. ¿Cuál
                                                es el proceso a seguir?
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Dado que tuviste que rematricular, debes esperar a que la edición termine por completo. Esto es debido a que la
                                            universidad realiza el cierre de actas y expedientes de ediciones completas y no de alumnos por separado.</p>

                                            <p>Cuando la edición en el que rematriculaste, cierre oficialmente, te mandaremos el certificado provisional de notas y
                                            posteriormente, te haremos llegar el correo de confirmación de datos y el correo de trámites de diploma con sus
                                            respectivas tasas administrativas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                5. “Realicé el pago para el trámite de diploma, pero no he recibido respuesta ¿Hay algún problema?”
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Si recibiste el correo de trámites de diploma, realizaste el pago, pero no has recibido respuesta, lo más probable es
                                            que no hayas creado el ticket como se indicó en nuestra página web de Secretaría.

                                            Para crear el ticket puedes ingresar al siguiente enlace: <a href="http://eadic.biz/soporte/open.php">http://eadic.biz/soporte/open.php</a>. Seleccionas el help topic
                                            o tema de ayuda y adjuntas (en el área sombreada que dice Drop files here or choose them) el comprobante de pago. En
                                            detalles de mensaje indica la dirección completa de envío con un teléfono de contacto.
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                6. “¿Es posible no colocar en el diploma la atención DON/DOÑA?”
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Lamentablemente no es posible. El diploma es diseñado por la Universidad, por lo que no es posible cambiar dicho
                                            formato.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                7. “¿Cómo me enviarán mis documentos?”
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseSeven" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p><strong>Respuesta:</strong></p>
                                            <p>El envío se realiza a través de la empresa DHL. Cuando tu diploma salga de nuestras oficinas, te mandaremos el código de
                                            envío para el seguimiento. El tiempo que tarda en llegar a tu residencia es entre 7 y 8 días.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                8. ¿Cuales son los tiempos que tengo de entrega para las actividades?
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseEight" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Para entregar las actividades de cada módulo tienes 5 semanas , las 4 semanas de impartición más la ventana de
                                            recuperación de actividades
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                9. ¿ Dónde puedo revisar las grabaciones de las clases?

                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseNine" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Debes de obtener una calificación mínima de 5 en el examen final y en la nota final del módulo. Para ampliar la
                                            información podemos ingresar en nuestro módulo <strong>Aula común</strong> en el espacio <strong>Metodología</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTen">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                10. ¿Qué pasa si no realizas la entrega de algún caso práctico o alguna actividad en tiempo?
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseTen" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Debes ponerte en contacto con un asesor académico por medio del espacio</p>
                                            <div class="text-center">
                                                <img src="{{ asset("img/pregunta10.png") }}" alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseEleven">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                11. ¿Dónde puedo revisar el calendario del curso que estoy realizando?
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseEleven" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Ingresar en nuestro módulo <strong>Aula común</strong> en el espacio <strong>Calendario</strong>, allí podrás descargarlo y sincronizarlo con tu
                                            calendario de Outlook
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwelve">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                12. ¿Dónde puedo revisar las grabaciones de las clases?
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseTwelve" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            En el <strong>inicio de cada uno de los módulos</strong> en el <strong>bloque derecho</strong> encontrarás el espacio <strong>Grabaciones Webinar</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThirteen">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                13. ¿Cómo me notifican las actividades del máster?

                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseThirteen" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>En el <strong>inicio de cada uno de los módulos</strong> en el <strong>bloque derecho</strong> encontrarás el espacio <strong>Calendario</strong>.</p>
                                            <div class="text-center">
                                                <img src="{{ asset("img/pregunta13.png") }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFourten">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                14. No puedo instalar el software, me pide un certificado de alumno activo
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapseFourten" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Para realizar <strong>la descarga del certificado de alumno activo</strong> realiza los siguientes pasos:</p>
                                            <ol>
                                                <li>Ingresa en el módulo <strong>Aula común</strong></li>
                                                <li>Da clic en el espacio <strong>“Módulos de software”</strong></li>
                                                <li>Debes cumplir las actividades señaladas</li>
                                                <li>Da clic y descarga el certificado</li>
                                            </ol>
                                            <p>Si ya se ha pasado el tiempo y no es posible la descarga debes ponerte en contacto con un asesor académico por medio del
                                            espacio</p>
                                            <div class="text-center">
                                                <img src="{{ asset("img/pregunta10.png") }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse15">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                15. No puedo instalar el software, me pide un certificado de alumno activo
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapse15" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Si el módulo tiene <strong>software</strong> y el docente lo indica, podrá <strong>descargar el instructivo</strong> de instalación en el espacio <strong>“Foros”</strong>
                                            y seguir los pasos señalados.
                                            <div class="text-center">
                                                <img src="{{ asset("img/pregunta15.png") }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-12 mt-3 text-center">
                                <p class="lead">
                                    <a href="contact-us.html">Contact us</a>,
                                    if you found not the right anwser or you have a other question?<br>
                                </p>
                            </div>
                        </div> --}}
                    </section>
                </div>
                <div class="card-footer">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
