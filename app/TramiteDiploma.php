<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TramiteDiploma extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'TICKET_DIPLOMAYNOTAS';
    }

    /**
     * Get all of the category for the TramiteDiploma
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->hasMany(Category::class, 'categoria_id', 'id');
    }
}
