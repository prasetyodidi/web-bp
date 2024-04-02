<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ReadBlog extends Component
{
    public $post;

    public function mount($id) {
        $this->post = Post::where('id', $id)->first();
    }
    
    #[Layout('layouts.PublicAccess')] 
    public function render()
    {
        return view('livewire.blog.read-blog');
        // 'post' => Post::where('id', $this->postID)->first() 
    }
}
