<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Presenters\Logs\CertificadosActivosDescargadosLog;

class CerficadoActivoLog extends Model
{
    protected $table = 'cerficado_activo_logs';
    protected $guarded = [];

    /**
     * Get the alumnoActivo that owns the CerficadoActivoLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumnoActivo(): BelongsTo
    {
        return $this->belongsTo(AlumnoActivo::class, 'correo');
    }

    public function present()
    {
        return new CertificadosActivosDescargadosLog($this);
    }
}
