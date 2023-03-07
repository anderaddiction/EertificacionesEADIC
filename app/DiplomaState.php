<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\Diploma_State\DiplomaStatePresenter;

class DiplomaState extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the concept that owns the DiplomaState
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function concept()
    {
        return $this->belongsTo(Concept::class);
    }

    public function present()
    {
        return new DiplomaStatePresenter($this);
    }
}
