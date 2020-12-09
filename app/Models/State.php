<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    // En un estado hay muchos trámites
    public function procedures()
    {
        return $this->hasMany('App\Models\Procedure');
    }
}
