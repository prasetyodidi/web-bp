<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Models\PostCategory;
use Livewire\Attributes\Layout;

class EditBlog extends Component
{
    public $post;
    public $title;
    public $cover;
    public $content;
    public $post_category;
    public $categories;
    public $category;
    
    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->categories = Category::all();
        $this->title = $this->post->title;
        $this->cover = $this->post->cover;
        $this->content = $this->post->content;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'cover' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        $post = Post::findOrFail($this->post->id);
        $post->update([
            'title' => $this->title,
            'cover' => $this->cover,
            'content' => $this->content,
        ]);
        
        PostCategory::where('post_id', $this->post->id)
    ->update(['category_id' => $this->category]);

        return redirect()->to('blog');
    }
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.blog.edit-blog');
    }
}
