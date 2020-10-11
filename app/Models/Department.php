<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function users()
    {
        // En 1 departamento hay muchos usuarios
        return $this->hasMany('App\User');
    }

}
