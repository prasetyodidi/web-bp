{{-- <div class="">
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
    @foreach ($comments as $comment)
        @if ($comment->parent_comment_id === null)
            <livewire:components.comment-view :postId="$post->id" :comment="$comment" :key="$comment->id" />
        @endif
    @endforeach
</div>   --}}
<div class="flex flex-col h-screen max-w-[1200px] mx-auto">
    <div class="text-center">
        <p class="text-3xl font-bold text-third-blue">
            {{ $post->title }}
        </p>
    </div>
    <div class="mt-8 items-center justify-center">
        <img class="w-[1200px] h-96 object-fit" src="{{ asset('storage/' . $post->cover) }}" alt="">
    </div>
    <div class="mt-4 flex justify-between">
        <p class="text-xl font-medium">{{ $post->owner->name }}</p>
        <p class="text-xl font-medium">{{ $post->updated_at->toDateString() }}</p>
    </div>
    <div class="mt-4">
        <p class="text-3xl font-bold text-third-blue">{{ $post->title }}</p>
        <p class="text-xl font-medium">{{ $post->content }}</p>
    </div>
    <div class="mt-20">
        <p class="text-4xl text-third-blue font-bold">Comments</p>
    </div>
    <div class="flex mt-10">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 text-primary-blue">
            <path fill-rule="evenodd"
                d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                clip-rule="evenodd" />
        </svg>
        <form wire:submit.prevent="newComment('{{ $post->id }}')" class="ml-4">
            <div class="flex">
                <input type="text" wire:model="message" placeholder="Comment"
                    class="w-full rounded border px-3 py-2"/>
                <button type="submit" class="ml-2 px-4 py-2 bg-primary-blue text-white rounded hover:bg-primary-blue-dark">Submit</button>
            </div>
        </form>
    </div>
</div>

