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
     * Get the user that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tramiteDiploma()
    {
        return $this->belongsTo(TramiteDiploma::class, 'UNIVERSIDAD_ID');
    }

    public function present()
    {
        return new UniversityPresenter($this);
    }
}
