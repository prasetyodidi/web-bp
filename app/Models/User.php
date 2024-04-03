<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'address',
        'phone',
        'profession'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'owner_id', 'id');
    }

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class, 'user_id', 'id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'owner_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'owner_id', 'id');
    }
    public function postLikes()
    {
        return $this->hasMany(PostLike::class, 'owner_id', 'id');
    }

    public function isLiked(Post $post)
    {
        return $this->postLikes->contains('post_id', $post->id);
    }
    public function postDisikes()
    {
        return $this->hasMany(PostDislike::class, 'owner_id', 'id');
    }

    public function isDisiked(Post $post)
    {
        return $this->postDisikes->contains('post_id', $post->id);
    }
}
