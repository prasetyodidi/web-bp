<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "owner_id",
        "post_id",
        "parent_comment_id",
        "message"
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class, 'comment_id', 'id');
    }
    public function dislikes()
    {
        return $this->hasMany(CommentDislike::class, 'comment_id', 'id');
    }
}
