<?php

namespace App\Presenters\Users;

use App\User;

class UserPresenter
{
    protected $user;

    public function __construct(User $user)
    {
        return $this->user = $user;
    }

    public function id()
    {
        return $this->user->id;
    }

    public function name()
    {
        return $this->user->name;
    }

    public function email()
    {
        return $this->user->email;
    }

    public function role()
    {
        return $this->user->roles->pluck('display_name')->implode(', ');
    }

    public function createdAt()
    {
        return $this->user->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '
            <div class="btn-group">
                <a href="' . route('user.edit', $this->user) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('user.show', $this->user) . '" class="btn btn-warning">
                <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </div>
        ';
    }

    public function actionShowButtons()
    {
        return '';
    }
}
