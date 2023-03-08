<?php

namespace App;

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
}
