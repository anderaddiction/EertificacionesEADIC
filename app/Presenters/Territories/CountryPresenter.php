<?php

namespace App\Presenters\Territories;

use App\Country;

class CountryPresenter
{
    protected $country;

    public function __construct(Country $country)
    {
        return $this->country = $country;
    }

    public function id()
    {
        return $this->country->id;
    }

    public function name()
    {
        return $this->country->name;
    }

    public function slug()
    {
        return $this->country->slug;
    }

    public function note()
    {
        return $this->country->note;
    }

    public function codePhone()
    {
        return $this->country->phone_code;
    }

    public function createdAt()
    {
        return $this->country->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '
            <div class="btn-group">
                <a href="' . route('country.edit', $this->country) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('country.show', $this->country) . '" class="btn btn-warning">
                <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </div>
        ';
    }
}
