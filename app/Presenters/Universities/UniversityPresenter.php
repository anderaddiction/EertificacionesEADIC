<?php

namespace App\Presenters\Universities;

use App\University;

class UniversityPresenter
{
    protected $university;

    public function __construct(University $university)
    {
        return $this->university = $university;
    }

    public function id()
    {
        return $this->university->id;
    }

    public function code()
    {
        return $this->university->code;
    }

    public function name()
    {
        return $this->university->name;
    }

    public function status()
    {
        if ($this->university->status === 1) {
            return '<i class="fa-regular fa-circle-check text-success"></i>';
        } else {
            return '<i class="fa-regular fa-circle-xmark text-danger"></i>';
        }
    }

    public function slug()
    {
        return $this->university->slug;
    }

    public function note()
    {
        return $this->university->note;
    }

    public function createdAt()
    {
        return $this->university->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '
            <div class="btn-group">
                <a href="' . route('university.edit', $this->university) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('university.show', $this->university) . '" class="btn btn-warning">
                <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </div>
        ';
    }
}
