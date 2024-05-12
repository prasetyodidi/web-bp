<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $owner_id
 * @property string $post_id
 * @property int|null $parent_comment_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CommentDislike> $dislikes
 * @property-read int|null $dislikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CommentLike> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\User $owner
 * @property-read \App\Models\Post $post
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Comment> $replies
 * @property-read int|null $replies_count
 * @method static \Database\Factories\CommentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereParentCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $comment_id
 * @property string $owner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Comment|null $comment
 * @property-read \App\Models\User|null $owner
 * @method static \Database\Factories\CommentDislikeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CommentDislike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentDislike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentDislike query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentDislike whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentDislike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentDislike whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentDislike whereUpdatedAt($value)
 */
	class CommentDislike extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $comment_id
 * @property string $owner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Comment|null $comment
 * @property-read \App\Models\User|null $owner
 * @method static \Database\Factories\CommentLikeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CommentLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentLike whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentLike whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentLike whereUpdatedAt($value)
 */
	class CommentLike extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $owner_id
 * @property string $event_time
 * @property string $location
 * @property int $price
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Participant> $participants
 * @property-read int|null $participants_count
 * @method static \Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $user_id
 * @property string $event_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ParticipantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Participant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereUserId($value)
 */
	class Participant extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $owner_id
 * @property string $title
 * @property string $cover
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PostDislike> $dislikes
 * @property-read int|null $dislikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PostLike> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $userLikes
 * @property-read int|null $user_likes_count
 * @method static \Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $post_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereUpdatedAt($value)
 */
	class PostCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $post_id
 * @property string $owner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PostDislikeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PostDislike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostDislike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostDislike query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostDislike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostDislike whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostDislike wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostDislike whereUpdatedAt($value)
 */
	class PostDislike extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $post_id
 * @property string $owner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PostLikeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike whereUpdatedAt($value)
 */
	class PostLike extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $post_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereUpdatedAt($value)
 */
	class PostTag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Database\Factories\TagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $birth_date
 * @property string $address
 * @property int $phone
 * @property string $profession
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Event> $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Participant> $participants
 * @property-read int|null $participants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PostDislike> $postDisikes
 * @property-read int|null $post_disikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PostLike> $postLikes
 * @property-read int|null $post_likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

