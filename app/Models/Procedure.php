<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $guarded = [];

    //Un trámite está en un estado
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    //Un trámite está en una categoría
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // Un tipo de trámite es para muchos usuarios
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps(); // withTimestamps = Rellena automáticamente los created_at y updated_at
    }

    public function asignarUser($user){
        $this->users()->sync($user, false);
    }

    public function tieneUser(){
        return $this->users->flatten()->pluck('name')->unique();
    }
}
