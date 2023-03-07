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

    public function present()
    {
        return new MasterPresenter($this);
    }
}