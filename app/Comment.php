<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'post' => 'App\Post'
]); // hena ba3ml map lel app\Post a5leh post bas 3lshn a3rf a3ml retrieve men el DB

class Comment extends Model
{
    protected $fillable=['commentable_id','commentable_type','body'];
    public function commentable()
    { // func name should be same as commentable_id & commentable_type in mirgation file
        return $this->morphTo();
    }
}
