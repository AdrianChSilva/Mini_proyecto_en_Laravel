<?php

namespace PruebApp;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name', 'description', 'avatar', 'slug'];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
