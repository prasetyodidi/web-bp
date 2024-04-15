<?php

namespace App\Livewire\Components;

use App\Models\Comment;
use Livewire\Component;
use App\Models\CommentLike;
use App\Models\CommentDislike;

class CommentView extends Component
{
    public $comment;
    public $postId;

    public $message;

    public function like($idComment)
    {
        if (auth()->guest()) {
            return $this->redirectRoute('login');
        }

        $user = auth()->user();
        CommentDislike::where('comment_id', $idComment)->where('owner_id', $user->id)->delete();
        $like = CommentLike::where('comment_id', $idComment)->where('owner_id', $user->id)->first();
        if ($like) {
            CommentLike::where('comment_id', $idComment)->where('owner_id', $user->id)->delete();
        } else {
            CommentLike::create([
                'comment_id' => $idComment,
                'owner_id' => auth()->user()->id,
            ]);
        }
    }
    public function dislike($idComment)
    {
        if (auth()->guest()) {
            return $this->redirectRoute('login');
        }

        $user = auth()->user();
        CommentLike::where('comment_id', $idComment)->where('owner_id', $user->id)->delete();
        $dislike = CommentDislike::where('comment_id', $idComment)->where('owner_id', $user->id)->first();

        if ($dislike) {
            CommentDislike::where('comment_id', $idComment)->where('owner_id', $user->id)->delete();
        } else {
            CommentDislike::create([
                'comment_id' => $idComment,
                'owner_id' => auth()->user()->id,
            ]);
        }
    }

    public function delete($idComment)
    {
        $comment = Comment::where('id', $idComment)->first();
        if($comment->parent_comment_id !== NULL) {
            $comment->delete();
            return redirect()->route('read.blog', ['id' => $this->postId]);
        } else {
            if ($comment->replies()->exists()) 
            {
                $comment->update([
                    'owner_id' => NULL,
                    'message' => "Pesan ini telah di hapus oleh pengguna"
                ]);
            }
        }
    }

    public function reply($idComment)
    {
        $user = auth()->user();
        $this->validate([
            'message' => 'required'
        ]);
        $parentComment = Comment::findOrFail($idComment);
        $postId = $parentComment->post_id;
        Comment::create([
            'owner_id' => $user->id,
            'post_id' => $postId,
            'parent_comment_id' => $idComment,
            'message' => $this->message
        ]);
        return redirect()->route('read.blog', ['id' => $this->postId]);
    }

    public function render()
    {
        return view('livewire.components.comment-view');
    }
}
