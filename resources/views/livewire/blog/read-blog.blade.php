<div class="">
    <div class="flex flex-col">
        <h1 class="text-white text-xl">{{ $post->title }}</h1>
        <img class="w-36" src="{{ asset('storage/' . $post->cover) }}">
        <p class="text-white">{{ $post->content }}</p>
    </div>
    <form wire:submit="newComment('{{ $post->id }}')" class="max-w-2xl rounded-lg mt-20">
        <div class="px-3 mb-2 mt-2">
            <textarea wire:model="message" placeholder="comment" class="w-full rounded border leading-normal resize-none h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></textarea>
        </div>
        <div class="flex justify-end px-4">
            <input type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value="Comment">
        </div>
    </form>
    @foreach($comments as $comment)
        @if ($comment->parent_comment_id === NULL)
            <livewire:components.comment-view :postId="$post->id" :comment="$comment" :key="$comment->id" />
        @endif
    @endforeach
</div>  
