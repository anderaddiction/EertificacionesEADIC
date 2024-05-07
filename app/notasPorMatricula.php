<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notasPorMatricula extends Model
{
    protected $table = 'notas_por_matricula';
    protected $fillable = [
        'codigoUnicoEstudiante',
        'asignaturas_1',
        'asignaturas_2',
        'asignaturas_3',
        'asignaturas_4',
        'asignaturas_5',
        'asignaturas_6',
        'asignaturas_7',
        'asignaturas_8',
        'asignaturas_9',
        'modulos_1',
        'modulos_2',
        'modulos_3',
        'modulos_4',
        'modulos_5',
        'modulos_6',
        'modulos_7',
        'modulos_8',
        'modulos_9',
        'estado_1',
        'estado_2',
        'estado_3',
        'estado_4',
        'estado_5',
        'estado_6',
        'estado_7',
        'estado_8',
        'estado_9',
        'baremos_1',
        'baremos_2',
        'baremos_3',
        'baremos_4',
        'baremos_5',
        'baremos_6',
        'baremos_7',
        'baremos_8',
        'baremos_9',
        'bloqueado',
    ];
}
