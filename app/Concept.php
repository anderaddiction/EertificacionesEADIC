<?php

namespace App;

use Illuminate\Support\Str;
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

    /**
     * Get the diploma associated with the Concept
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function diploma()
    {
        return $this->hasOne(DiplomaState::class);
    }

    public function present()
    {
        return new ConceptPresenter($this);
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
}
