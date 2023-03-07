<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\Concepts\ConceptPresenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concept extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function present()
    {
        return new ConceptPresenter($this);
    }
}
