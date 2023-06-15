<?php

namespace App\Presenters\Diploma_State;

use App\DiplomaState;
use Illuminate\Support\Str;

class DiplomaStatePresenter
{
    protected $diploma;

    public function __construct(DiplomaState $diploma)
    {
        return $this->diploma = $diploma;
    }

    public function id()
    {
        return $this->diploma->id;
    }

    public function code()
    {
        return $this->diploma->code;
    }

    public function name()
    {
        return Str::limit($this->diploma->name, 20, '...');
    }

    public function concept()
    {
        return Str::limit($this->diploma->concept->name, 20, '...');
    }

    public function status()
    {
        if ($this->diploma->status === 1) {
            return '<i class="fa-regular fa-circle-check text-success"></i>';
        } else {
            return '<i class="fa-regular fa-circle-xmark text-danger"></i>';
        }
    }

    public function slug()
    {
        return $this->diploma->slug;
    }

    public function note()
    {
        return Str::limit($this->diploma->note, 20, '...');
    }

    public function createdAt()
    {
        return $this->diploma->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '

            <div class="btn-group">
                <a href="' . route('diploma_state.edit', $this->diploma) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('diploma_state.show', $this->diploma) . '" class="btn btn-warning">
                <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </div>
        ';
    }
}
