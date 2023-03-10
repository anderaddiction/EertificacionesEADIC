<?php

namespace App\Presenters\Concepts;

use App\Concept;
use Illuminate\Support\Str;

class ConceptPresenter
{
    protected $concept;

    public function __construct(Concept $concept)
    {
        return $this->concept = $concept;
    }

    public function id()
    {
        return $this->concept->id;
    }

    public function code()
    {
        return $this->concept->code;
    }

    public function name()
    {
        return Str::limit($this->concept->name, 50, '...');
    }

    public function status()
    {
        if ($this->concept->status === 1) {
            return '<i class="fa-regular fa-circle-check text-success"></i>';
        } else {
            return '<i class="fa-regular fa-circle-xmark text-danger"></i>';
        }
    }

    public function slug()
    {
        return $this->concept->slug;
    }

    public function note()
    {
        return $this->concept->note;
    }

    public function createdAt()
    {
        return $this->concept->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '
            <div class="btn-group">
                <a href="' . route('concept.edit', $this->concept) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('concept.show', $this->concept) . '" class="btn btn-warning">
                <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </div>
        ';
    }
}
