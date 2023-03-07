<?php

namespace App\Presenters\Certificate_State;

use App\CertificateState;
use Illuminate\Support\Str;

class CertificateStatePresenter
{
    protected $certificate;

    public function __construct(CertificateState $certificate)
    {
        return $this->certificate = $certificate;
    }

    public function id()
    {
        return $this->certificate->id;
    }

    public function code()
    {
        return $this->certificate->code;
    }

    public function name()
    {
        return Str::limit($this->certificate->name, 20, '...');
    }

    public function concept()
    {
        return Str::limit($this->certificate->concept->name, 20, '...');
    }

    public function status()
    {
        if ($this->certificate->status === 1) {
            return '<i class="fa-regular fa-circle-check text-success"></i>';
        } else {
            return '<i class="fa-regular fa-circle-xmark text-danger"></i>';
        }
    }

    public function slug()
    {
        return $this->certificate->slug;
    }

    public function note()
    {
        return Str::limit($this->certificate->note, 20, '...');
    }

    public function createdAt()
    {
        return $this->certificate->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '

            <div class="btn-group">
                <a href="' . route('certificate_status.edit', $this->certificate) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('certificate_status.show', $this->certificate) . '" class="btn btn-warning">
                <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </div>
        ';
    }
}
