<?php

namespace App\Presenters\Masters;

use App\Master;
use Illuminate\Support\Str;

class MasterPresenter
{
    protected $master;

    public function __construct(Master $master)
    {
        return $this->master = $master;
    }

    public function id()
    {
        return $this->master->id;
    }

    public function code()
    {
        return $this->master->code;
    }

    public function name()
    {
        return Str::limit($this->master->name, 250, '...');
    }

    public function codeMaster()
    {
        return $this->master->master_code;
    }

    public function status()
    {
        if ($this->master->status === 1) {
            return '<i class="fa-regular fa-circle-check text-success"></i>';
        } else {
            return '<i class="fa-regular fa-circle-xmark text-danger"></i>';
        }
    }

    public function slug()
    {
        return Str::limit($this->master->slug, 20, '...');
    }

    public function note()
    {
        return Str::limit($this->master->note, 20, '...');
    }

    public function createdAt()
    {
        return $this->master->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '
            <div class="btn-group">
                <a href="' . route('master.edit', $this->master) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('master.show', $this->master) . '" class="btn btn-warning">
                <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </div>
        ';
    }
}
