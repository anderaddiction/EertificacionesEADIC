<?php

namespace App;

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
}
