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
    protected $casts = [
        'open' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'open',
    ];

    /**
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Open the project
     *
     * @return void
     */
    public function open()
    {
        $this->update(['open' => true]);
    }

    /**
     * Close the project
     *
     * @return void
     */
    public function close()
    {
        $this->update(['open' => false]);
    }

    /**
     * @return boolean
     */
    public function isOpen()
    {
        return !! $this->open;
    }

    /**
     * @return boolean
     */
    public function isClosed()
    {
        return !!! $this->open;
    }

    /**
     * Scope a query to get open projects
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereOpen($query)
    {
        return $query->where('open', true);
    }

    /**
     * Scope a query to get closed projects
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereClosed($query)
    {
        return $query->where('open', false);
    }
}
