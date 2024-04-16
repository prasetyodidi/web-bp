<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ReadBlog extends Component
{
    public $post;
    public $comments;
    public $message;
    public function mount($id) {
        $this->post = Post::where('id', $id)->first();
        $this->comments = Comment::where('post_id', $id)->get();
    }
    public function newComment($idPost){
        if(auth()->guest()) {
            return $this->redirectRoute('login');
        }
        $user = auth()->user();
        $this->validate([
            'message' => 'required'
        ]);
        Comment::create([
            'owner_id' => $user->id,
            'post_id' => $idPost,
            'message' => $this->message
        ]);
        return redirect()->route('read.blog', [$idPost]);
    }


    #[Layout('layouts.PublicAccess')] 
    public function render()
    {
        return view('livewire.blog.read-blog');
    }
}