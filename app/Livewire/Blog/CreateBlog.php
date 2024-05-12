<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Models\PostCategory;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class CreateBlog extends Component
{
    use WithFileUploads;

    public $title;
    public $cover;
    public $content;

    public $categories;
    public $category;
    public function mount()
    {
        $this->categories = Category::all();
    }

    public function save() {
        $this->validate([
            'title' => 'required',
            'cover' => 'required|image|max:2048',
            'content' => 'required',
        ]);
        $file = $this->cover->store('images','public');
        $post = Post::create([
            'owner_id' => auth()->user()->id,
            'title' => $this->title,
            'cover' => $file,
            'content' => $this->content,
        ]);
        PostCategory::create([
            'post_id' => $post->id,
            'category_id' => $this->category
        ]);
        $this->redirect('/');
    }

    #[Layout('layouts.dashboardnav')]
    public function render()
    {
        return view('livewire.blog.create-blog');
    }
}
