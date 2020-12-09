<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    // En una categoría hay muchos trámites
    public function procedures()
    {
        return $this->hasMany('App\Models\Procedure');
    }
}
