<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;
    protected $encrypted = [];

    protected $dates = [
        'created_at'
    ];
    protected $fillable = ['comment', 'user_id', 'parent_id', 'commentable_type', 'commentable_id', 'is_internal'];
    protected static $logAttributes = ['comment', 'user_id', 'parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
