@extends('layouts.app')

@section('content_header')
<h1>Estado de Trámite de Diploma</h1>
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
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Ticket</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control " id="category" disabled value="{{ $results[0]->ticket_diplomaynota }}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('Category') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="category"  disabled value="{{ utf8_decode($results[0]->category->name) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group row ">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('Puppil') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control " id="category" disabled
                                        value="{{ $results[0]->nombre.' '.$results[0]->apellido }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('University') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="category" disabled
                                        value="{{ utf8_decode($results[0]->university->name) }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-1 col-form-label">{{ __('Master') }}</label>
                                <div class="col-sm-8" style="margin-left:4%">
                                    <input type="text" class="form-control" id="category" disabled value="{{ $results[0]->master->name }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row pt-3">
                        <div class="col-md-4">
                            <div class="sticky-top mb-3">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('Incidencies') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        @if ($results[0]->incidencia == ' ')
                                            <div class="alert bg-sendary">
                                                <h5><i class="icon fas fa-check"></i> {{ __('No Incidencies') }}</h5>
                                                <small>No se reportan incidencias</small>
                                            </div>
                                        @else
                                            <div class="alert alert-danger alert-dismissible">
                                                <h5><i class="icon fas fa-ban"></i> {{ __('Incidencies') }}</h5>
                                                <small>{!! $results[0]->incidencia !!}</small>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('Note') }}</h3>
                                    </div>
                                    <div class="card-body">
                                        @if ($results[0]->OBS_INCIDENCIA == '')
                                            <div class="alert bg-sencondary">
                                                <h5><i class="icon fas fa-check"></i> {{ __('No Notes') }}</h5>
                                                <small class="text-justify">No hay observaciones asociadas a este estado de certificación.</small>
                                            </div>
                                        @else
                                            <div class="alert alert-danger alert-dismissible">
                                                <small class="text-justify">{{ $results[0]->OBS_INCIDENCIA }}</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Estado de trámite') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div id="external-events">
                                        @if (utf8_encode($results[0]->category->name) === 'Diploma + Certificado + Apostilla + Envio')
                                            @if ($results[0]->diploma_state->name === 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC')
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree25">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree25" class="collapse show" data-parent="#accordion25">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                            @elseif ($results[0]->diploma_state->name === 'Diploma en oficina EADIC, para apostillar')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree25">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree25" class="collapse show" data-parent="#accordion25">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                            @elseif ($results[0]->diploma_state->name === 'Diploma en Notaría')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree26">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree26" class="collapse show" data-parent="#accordion26">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                            @elseif ($results[0]->diploma_state->name === 'Diploma en Colegio Notarial')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree27">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree27" class="collapse show" data-parent="#accordion27">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Diploma apostillado en EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Colegio Notarial
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree28">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree28" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree1">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree1" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif ($results[0]->category->name === 'Diploma + Apostilla + Envio')
                                            @if ($results[0]->diploma_state->name === 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC')
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree1">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                            @elseif ($results[0]->diploma_state->name === 'Diploma en oficina EADIC, para apostillar')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree2">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree2" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                            @elseif ($results[0]->diploma_state->name === 'Diploma en Notaría')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree3">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree3" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                            @elseif ($results[0]->diploma_state->name === 'Diploma en Colegio Notarial')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en oficina
                                                    Diploma en oficina EADIC, para apostillar
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma en Notaría
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree4">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree4" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma
                                                    apostillado en EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Diploma apostillado en EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree5">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree5" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree6">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree6" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif ($results[0]->category->name === 'Diploma + Envio')
                                            @if ($results[0]->diploma_state->name === 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC')
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree7">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree7" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin apostilla) en oficina EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Diploma (sin apostilla) en oficina EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree8">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree8" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin apostilla) en oficina EADIC, pendiente de envío
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree9">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree9" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif ($results[0]->category->name === 'Diploma + Certificado + Envio')
                                            @if ($results[0]->diploma_state->name === 'Con trámite solicitado por estudiante/Diploma pendiente de llegada a EADIC')
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree10">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree10" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin
                                                    apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Diploma (sin apostilla) en oficina EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree11">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree11" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin
                                                    apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree12">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree12" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif ($results[0]->category->name === 'Certificado + Envio')
                                            @if ($results[0]->diploma_state->name === 'Pendiente de solicitarlo a la Universidad')
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree14">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree14" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Solicitado a la Universidad
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas (sin apostilla) en oficina EADIC, pendiente de envío
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Solicitado a la Universidad')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree15">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree15" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas
                                                    (sin apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Cert. de Notas (sin apostilla) en oficina EADIC, pendiente de envío')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin
                                                    apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree16">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree16" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Enviado a
                                                    estudiante
                                                </div>
                                            @elseif ($results[0]->diploma_state->name === 'Enviado a estudiante')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Con trámite
                                                    solicitado por estudiante/Diploma pendiente de llegada a EADIC
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Diploma (sin
                                                    apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Cert. de Notas
                                                    (sin apostilla) en oficina EADIC, pendiente de envio
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree17">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree17" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif ($results[0]->category->name === 'Certificado + Apostilla + Envio')
                                            @if ($results[0]->diploma_state->name === 'Pendiente de solicitarlo a la Universidad')
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree18">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree18" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                            @elseif ($results[0]->diploma_state->name === 'Solicitado a la Universidad')
                                                <div class="external-event bg-secondary ui-draggable ui-draggable-handle" style="position: relative;">Pendiente de solicitarlo a la Universidad
                                                </div>
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree19">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree19" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree20">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree20" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree21">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree21" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree22">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree22" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree23">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree23" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree24">
                                                                {{ $results[0]->diploma_state->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree24" class="collapse show">
                                                        <div class="card-body">
                                                            {{ $results[0]->diploma_state->concept->name }}
                                                        </div>
                                                    </div>
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
                            print_r($results[0]->categoria_id);
                        echo "</pre>";
                    @endphp --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
