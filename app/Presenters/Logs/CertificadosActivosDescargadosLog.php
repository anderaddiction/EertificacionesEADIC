<?php

namespace App\Presenters\Logs;

use App\CerficadoActivoLog;

class CertificadosActivosDescargadosLog
{
    protected $cert_actv_descargado;

    public function __construct(CerficadoActivoLog $cert_actv_descargado)
    {
        return $this->cert_actv_descargado = $cert_actv_descargado;
    }

    public function email()
    {
        return $this->cert_actv_descargado->correo;
    }

    public function master()
    {
        return $this->cert_actv_descargado->master;
    }

    public function universidad()
    {
        return $this->cert_actv_descargado->universidad_espanola;
    }

    public function downloadedDate()
    {
        return $this->cert_actv_descargado->created_at;
    }
}
