<?php

namespace PruebApp;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('PruebApp\User');

    }
}
