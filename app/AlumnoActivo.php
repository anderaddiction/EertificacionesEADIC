<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Presenters\Logs\CertificadosActivosDescargadosLog;

class AlumnoActivo extends Model
{
    protected $table = 'alumno_activos';

    /**
     * Get the log associated with the AlumnoActivo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function log(): HasOne
    {
        return $this->hasOne(CerficadoActivoLog::class, 'correo', 'id');
    }

    protected $guarded = [];
}
