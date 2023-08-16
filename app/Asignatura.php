<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Asignatura extends Model
{

    protected $table = 'asignatura';

    protected $fillable = [
        'code', 'numero_de_la_asignatura', 'nombre',
        'creditos', 'slug'
    ];

    public function generateUrl($value)
    {
        return Str::slug($value);
    }

    //Relationships Many to Many

    public function masters()
    {
        return $this->belongsToMany(Master::class, 'master_asignatura', 'id_asignatura', 'id_master');
    }
}
