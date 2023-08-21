<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Masters\MasterPresenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class Master extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * Get the tramite_diploma associated with the DiplomaState
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tramite_diploma()
    {
        return $this->hasOne(TramiteDiploma::class);
    }

    public function present()
    {
        return new MasterPresenter($this);
    }

    function getRandomString()
    {
        $characters     = '0123456789';
        $randomString     = "";

        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public function generateUrl($value)
    {
        return Str::slug($value);
    }

    //Relationships Many to Many
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'master_asignatura', 'id_master', 'id_asignatura');
    }
    public function datosPorMatricula()
    {
        return $this->hasOne(DatosPorMatricula::class, 'id_master');
    }
}
