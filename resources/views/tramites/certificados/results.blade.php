@extends('layouts.app')

@section('content_header')
<h1>Estado de Tramite de Diploma</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">{{ __('Conoce el status de tu diploma y/o certificado de notas') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group row ">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ticket</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control " id="category" disabled value="{{ $results[0]->TICKET_DIPLOMAYNOTAS }}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="category"  disabled value="{{ utf8_decode($results[0]->CATEGORIA) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-4">
                            <div class="sticky-top mb-3">
                                <div class="card card-teal">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('Incidencies') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        @if ($results[0]->OBS_INCIDENCIA === '')
                                            <div class="alert bg-teal">
                                                <h5><i class="icon fas fa-check"></i> {{ __('No Incidencies') }}</h5>
                                                <small>No hay incidencias asociadas a este estado de certificación.</small>
                                            </div>
                                        @else
                                            <div class="alert alert-danger alert-dismissible">
                                                <h5><i class="icon fas fa-ban"></i> {{ __('Incidencies') }}</h5>
                                                <small>{!! $results[0]->OBS_INCIDENCIA !!}</small>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <div class="card card-lightblue">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('Note') }}</h3>
                                    </div>
                                    <div class="card-body">
                                        @if ($results[0]->OBS_INCIDENCIA === '')
                                            <div class="alert bg-lightblue">
                                                <h5><i class="icon fas fa-check"></i> {{ __('No Notes') }}</h5>
                                                <small class="text-justify">No hay observaciones asociadas a este estado de certificación.</small>
                                            </div>
                                        @else
                                            <div class="alert alert-danger alert-dismissible">
                                                <small class="text-justify">{!! $results[0]->OBS_INCIDENCIA !!}</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card card-olive">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('State of Certification') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div id="external-events">
                                        @if (utf8_encode($results[0]->CATEGORIA) === 'Diploma + Certificado + Apostilla + Envio')
                                            @if ($results[0]->ESTADO_DIPLOMA === 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC')
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma apostillado en EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma en oficina EADIC, para apostillar')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    {{ $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio
                                                    Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma en Notaría')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{ $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio
                                                    Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma en Colegio Notarial')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma apostillado en EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio Notarial
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio
                                                    Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma apostillado en EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                            @endif
                                        @elseif ($results[0]->CATEGORIA === 'Diploma + Apostilla + Envio')
                                            @if ($results[0]->ESTADO_DIPLOMA === 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC')
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio
                                                    Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma en oficina EADIC, para apostillar')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    {{ $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio
                                                    Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma en Notaría')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio
                                                    Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma en Colegio Notarial')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma apostillado en EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio
                                                    Notarial
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio
                                                    Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                            @endif
                                        @elseif ($results[0]->CATEGORIA === 'Diploma + Envio')
                                            @if ($results[0]->ESTADO_DIPLOMA === 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC')
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin apostilla) en oficina EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma (sin apostilla) en oficina EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{ $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin apostilla) en oficina EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                            @endif
                                        @elseif ($results[0]->CATEGORIA === 'Diploma + Certificado + Envio')
                                            @if ($results[0]->ESTADO_DIPLOMA === 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC')
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin
                                                    apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Diploma (sin apostilla) en oficina EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin
                                                    apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                            @endif
                                        @elseif ($results[0]->CATEGORIA === 'Certificado + Envio')
                                            @if ($results[0]->ESTADO_DIPLOMA === 'Pendiente de solicitarlo a la Universidad')
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Solicitado a la Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas (sin apostilla) en oficina EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Solicitado a la Universidad')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas
                                                    (sin apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Cert. de Notas (sin apostilla) en oficina EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin
                                                    apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con tramite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin
                                                    apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas
                                                    (sin apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                            @endif
                                        @elseif ($results[0]->CATEGORIA === 'Certificado + Apostilla + Envio')
                                            @if ($results[0]->ESTADO_DIPLOMA === 'Pendiente de solicitarlo a la Universidad')
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                    $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Solicitado a la
                                                    Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en Colegio Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas apostillado en EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Solicitado a la Universidad')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Pendiente de solicitarlo a la Universidad
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    Colegio Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Cert. de Notas en oficina EADIC, para apostillar')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Pendiente de
                                                    solicitarlo a la Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Solicitado a la Universidad
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    Colegio Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Cert. de Notas en Notaría')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Pendiente de
                                                    solicitarlo a la Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Solicitado a la
                                                    Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    Colegio Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Cert. de Notas en Colegio Notarial')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Pendiente de
                                                    solicitarlo a la Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Solicitado a la
                                                    Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                Colegio Notarial
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Cert. de Notas apostillado en EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Pendiente de
                                                    solicitarlo a la Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Solicitado a la
                                                    Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en Colegio Notarial
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{
                                                $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->ESTADO_DIPLOMA === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Pendiente de
                                                    solicitarlo a la Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Solicitado a la
                                                    Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas en
                                                    Colegio Notarial
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas apostillado en EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">{{ $results[0]->ESTADO_DIPLOMA }}
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @php
                        echo "<pre>";
                            print_r($results[0]->CATEGORIA);
                        echo "</pre>";
                    @endphp --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
