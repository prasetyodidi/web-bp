<?php

namespace App\Livewire\Blog;

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

    public function Like($idPost){
        if(auth()->guest()) {
            return $this->redirectRoute('login');
        }
        
        $user = auth()->user();
        PostDislike::where('post_id', $idPost)->where('owner_id', $user->id)->delete();
        $like = PostLike::where('post_id', $idPost)->where('owner_id', $user->id)->first();
        
        if($like) {
            PostLike::where('post_id', $idPost)->where('owner_id', $user->id)->delete();
            session()->flash('status', 'Anda sudah menghapus like di postingan ini.');
        } else {
            PostLike::create([
                'post_id' => $idPost,
                'owner_id' => auth()->user()->id,
            ]);
            session()->flash('status', 'Anda sudah like di postingan ini.');
        }
    }
    
    public function Dislike($idPost){
        if(auth()->guest()) {
            return $this->redirectRoute('login');
        }
        $user = auth()->user();
        PostLike::where('post_id', $idPost)->where('owner_id', $user->id)->delete();
        $post = PostDislike::where('post_id', $idPost)->where('owner_id', $user->id)->first();
        if($post) {
            PostDislike::where('post_id', $idPost)->where('owner_id', $user->id)->delete();
            session()->flash('status', 'Anda sudah menyukai postingan ini.');
        } else {
            PostDislike::create([
                'post_id' => $idPost,
                'owner_id' => auth()->user()->id,
            ]);
        }
    }
    
    
    #[Layout('layouts.PublicAccess')] 
    public function render()
    {
        return view('livewire.blog.view-blog', [
            'posts' => Post::with('likes')->with('dislikes')->paginate(9),
        ]);
    }
}
