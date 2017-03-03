<?php

namespace App;

use App\Support\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Sluggable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description'
    ];
}
