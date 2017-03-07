<?php

namespace App;

use App\Post;
use App\User;
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
        return $this->hasMany(Post::class)
            ->orderBy('created_at', 'desc');
    }

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('is_admin');
    }

    /**
     * Get the projects for a given User
     *
     * @param User $user
     * @return \Illuminate\Support\Collection
     */
    public static function forUser(User $user)
    {
        return $user->projects;
    }

    /**
     * Get the member users for this project
     *
     * @return Illuminate\Support\Collection
     */
    public function getMembersAttribute()
    {
        return $this->users->filter(function ($user) {
            return ! $user->pivot->is_admin;
        });
    }

    /**
     * Get the admin users for the project
     *
     * @return Illuminate\Support\Collection
     */
    public function getAdminsAttribute()
    {
        return $this->users->filter(function ($user) {
            return $user->pivot->is_admin;
        });
    }

    /**
     * Add a User (as Member) to the project
     *
     * @param User $user
     * @param boolean $is_admin false
     * @return boolean
     */
    public function addMember(User $user, $is_admin = false)
    {
        $this->users()->attach($user->id, [
            'is_admin' => $is_admin
        ]);
    }

    /**
     * Add a User (as Admin) to the project
     *
     * @param User $user
     * @param boolean $is_admin false
     * @return boolean
     */
    public function addAdmin(User $user)
    {
        $this->addMember($user, true);
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
