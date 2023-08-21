<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\Universities\UniversityPresenter;

class University extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the user associated with the University
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tramiteDiploma()
    {
        return $this->hasOne(TramiteDiploma::class);
    }

    public function present()
    {
        return new UniversityPresenter($this);
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
    public function datosPorMatricula()
    {
        return $this->hasOne(DatosPorMatricula::class, 'id_universities');
    }
}
