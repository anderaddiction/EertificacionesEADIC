<?php

namespace App\Presenters\Roles;

use App\Role;

class RolePresenter
{
    protected $role;

    public function __construct(Role $role)
    {
        return $this->role = $role;
    }

    public function id()
    {
        return $this->role->id;
    }

    public function code()
    {
        return $this->role->code;
    }

    public function name()
    {
        return $this->role->name;
    }

    public function displayName()
    {
        return $this->role->display_name;
    }

    public function slug()
    {
        return $this->role->slug;
    }

    public function note()
    {
        return $this->role->note;
    }

    public function createdAt()
    {
        return $this->role->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '
            <div class="btn-group">
                <a href="' . route('role.edit', $this->role) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('role.show', $this->role) . '" class="btn btn-warning">
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
