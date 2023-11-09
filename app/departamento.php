<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $fillable = [
        'name', 'codigo', 'status',
    ];
}
