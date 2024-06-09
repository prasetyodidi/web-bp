<?php

namespace App\Livewire\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\Tag;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBlog extends Component
{
    use WithFileUploads;

    public $title;
    public $cover;
    public $content;
    public $selectedTag = [];
    public $currentStep = 1;
    public $totalStep = 2;
    public $selectedCategory = [];
    protected $listeners = ['nextStep', 'save'];

    public function validateForm()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'title' => 'required',
                'cover' => 'required|image|max:2048',
                'content' => 'required',
            ]);
        }
    }

    public function nextStep()
    {
        // $this->validateForm();
        if ($this->currentStep < $this->totalStep) {
            $this->currentStep++;
        }
        $this->dispatch('next-step');
    }

    public function save()
    {
        $this->validate([
            'selectedCategory' => 'required|array|min:1',
            'selectedTag' => 'required|array|min:1',
        ]);
        $file = $this->cover->store('images', 'public');
        $post = Post::create([
            'owner_id' => auth()->user()->id,
            'title' => $this->title,
            'cover' => $file,
            'content' => $this->content,
        ]);
        foreach ($this->selectedCategory as $categoryId) {
            PostCategory::create([
                'post_id' => $post->id,
                'category_id' => $categoryId,
            ]);
        }
        foreach ($this->selectedTag as $tagId) {
            PostTag::create([
                'post_id' => $post->id,
                'tag_id' => $tagId,
            ]);
        }
        $this->redirect('/');
    }

    #[Layout('layouts.dashboardnav')]
    public function render()
    {
        return view('livewire.blog.create-blog')->with([
            'tags' => Tag::all(),
            'categories' => Category::all()
        ]);
    }
}
