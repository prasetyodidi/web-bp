<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Layout;

class MyBlog extends Component
{   
    public $posts = [];
    public function mount() {
        $this->posts = Post::where('owner_id', auth()->user()->id)->get();
    }
    
    #[Layout('layouts.app')] 
    public function render()
    {
        return view('livewire.blog.my-blog');
    }
    public function deletePost($id) {
        Post::where('id', $id)->delete();
        return redirect()->route('my.blog');
    }
}
