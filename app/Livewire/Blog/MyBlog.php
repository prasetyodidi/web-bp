<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Layout;

class MyBlog extends Component
{
    // public $posts = [];
    public $search;
    // public function mount() {
    //     $this->posts = Post::where('owner_id', auth()->user()->id)->get();
    // }

    #[Layout('layouts.dashboardnav')]
    public function render()
    {
        $posts = Post::where('owner_id', auth()->user()->id)
        ->where('title', 'like', '%'.$this->search.'%')
        ->get();
        return view('livewire.blog.my-blog', [
            'posts' => $posts
        ]);
    }
    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('my.blog');
    }
}
