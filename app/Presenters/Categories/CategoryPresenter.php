<?php

namespace App\Presenters\Categories;

use App\Category;

class CategoryPresenter
{
    protected $category;

    public function __construct(Category $category)
    {
        return $this->category = $category;
    }

    public function id()
    {
        return $this->category->id;
    }

    public function code()
    {
        return $this->category->code;
    }

    public function name()
    {
        return $this->category->name;
    }

    public function status()
    {
        if ($this->category->status === 1) {
            return '<i class="fa-regular fa-circle-check text-success"></i>';
        } else {
            return '<i class="fa-regular fa-circle-xmark text-danger"></i>';
        }
    }

    public function slug()
    {
        return $this->category->slug;
    }

    public function note()
    {
        return $this->category->note;
    }

    public function createdAt()
    {
        return $this->category->created_at->diffForHumans();
    }

    public function actionButtons()
    {
        return '
            <div class="btn-group">
                <a href="' . route('category.edit', $this->category) . '"  class="btn btn-primary">
                <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('category.show', $this->category) . '" class="btn btn-warning">
                <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                </button>
            </div>
        ';
    }
}
