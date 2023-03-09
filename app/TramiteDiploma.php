<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TramiteDiploma extends Model
{
    //use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'ticket_diplomaynota';
    }

    /**
     * Get the category that owns the TramiteDiploma
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }

    /**
     * Get the diploma_state that owns the TramiteDiploma
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diploma_state()
    {
        return $this->belongsTo(DiplomaState::class, 'estado_diploma_id');
    }

    /**
     * Get the university that owns the TramiteDiploma
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function university()
    {
        return $this->belongsTo(University::class, 'universidad_id');
    }

    /**
     * Get the master that owns the TramiteDiploma
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function master()
    {
        return $this->belongsTo(Master::class, 'master_code');
    }
}
