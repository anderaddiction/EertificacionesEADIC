<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPorMatricula extends Model
{
    protected $table = 'datos_por_matricula';

    protected $fillable = [
        'nombre',
        'apellido',
        'documento_de_identidad',
        'email',
        'id_master',
        'id_universities',
        'situacion_financiera',
        'estado_matricula',
        'modalidad_de_estudio',
        'estado_formacion',
        'edicion_master',
        'fecha_inicio',
        'fecha_fin',
        'numero_oportunidad',
        'codigoUnicoEstudiante',
        'nombreOportunidad',
    ];

    public function master()
    {
        return $this->belongsTo(Master::class, 'id_master');
    }
    public function university()
    {
        return $this->belongsTo(University::class, 'id_universities');
    }
}
