<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use \Spatie\Tags\HasTags;
    use Sluggable;

    use HasTags;
    protected $fillable = ['title', 'description', 'user_id', 'image'];

    /**
     * create function for handling comments
     */

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * create new function that return object from user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'title']
        ];
    }

    /**
     * create new function that return date in different format
     */
    public function getBetterDateAttribute()
    {
        return $this->created_at->format('l j\'S \of F Y H:i:s a');
    }


}
