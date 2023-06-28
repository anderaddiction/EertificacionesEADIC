<?php

namespace App;

use App\Presenters\Logs\CertificadosActivosDescargadosLog;
use Illuminate\Database\Eloquent\Model;

class CerficadoActivoLog extends Model
{
    protected $table = 'cerficado_activo_logs';
    protected $guarded = [];

    public function present()
    {
        return new CertificadosActivosDescargadosLog($this);
    }
}
