<?php

namespace App;

use App\Post;
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

    /**
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
