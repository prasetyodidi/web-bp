<?php

namespace App\Livewire\Blog;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use App\Models\PostLike;
use App\Models\PostDislike;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class ViewBlog extends Component
{
    use WithPagination;

    public $like = 0;
    public $dislike = 0;

    public $status;

    public $message;

    public function Like($idPost)
    {
        if (auth()->guest()) {
            return $this->redirectRoute('login');
        }

        $user = auth()->user();
        PostDislike::where('post_id', $idPost)->where('owner_id', $user->id)->delete();
        $like = PostLike::where('post_id', $idPost)->where('owner_id', $user->id)->first();

        if ($like) {
            PostLike::where('post_id', $idPost)->where('owner_id', $user->id)->delete();
        } else {
            PostLike::create([
                'post_id' => $idPost,
                'owner_id' => auth()->user()->id,
            ]);
        }
    }

    public function Dislike($idPost)
    {
        if (auth()->guest()) {
            return $this->redirectRoute('login');
        }
        $user = auth()->user();
        PostLike::where('post_id', $idPost)->where('owner_id', $user->id)->delete();
        $post = PostDislike::where('post_id', $idPost)->where('owner_id', $user->id)->first();
        if ($post) {
            PostDislike::where('post_id', $idPost)->where('owner_id', $user->id)->delete();
        } else {
            PostDislike::create([
                'post_id' => $idPost,
                'owner_id' => auth()->user()->id,
            ]);
        }
    }


    #[Layout('layouts.header')]
    public function render()
    {
        return view('livewire.blog.view-blog', [
            'posts' => Post::with('likes')->with('dislikes')->with('owner')->paginate(6),
            // 'feature_post' => Post::
            'tags' => Tag::all()
        ]);
    }
}
