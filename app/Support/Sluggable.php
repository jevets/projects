<?php 

namespace App\Support;

trait Sluggable
{
    /**
     * Use `slug` for route model binding
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}