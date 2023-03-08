<?php

namespace App;

use App\TramiteDiploma;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\Categories\CategoryPresenter;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the tramiteDiploma associated with the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tramiteDiploma()
    {
        return $this->hasOne(TramiteDiploma::class);
    }

    public function present()
    {
        return new CategoryPresenter($this);
    }
}
