<div>
    <div class="grid grid-cols-3 place-items-center m-8 gap-8">
    @foreach ($posts as $post)
    <div class="">
        <div class="w-80 p-3 bg-gray-800 rounded-lg shadow-md">
            <img class="w-full h-40 object-cover rounded-t-lg" alt="Card Image" src="{{ asset('storage/' . $post->cover) }}">
            <div class="p-4">
                <h2 class="text-xl text-white font-semibold">{{ $post->title }}</h2>
                <p class="text-white"> {{ Str::limit($post->content, 50) }}</p>
                <div class="flex justify-between items-center mt-4">
                    <a wire:navigate href="edit/{{ $post->id }}"><button type="button" class="text-white p-2 rounded-full">Edit Post</button>
                    <a wire:navigate href="create"><button type="button" class=" text-white p-2 rounded-full">Red Post</button></a>
                    <button type="button" wire:confirm="Are you sure you want to delete this post?" wire:click="deletePost('{{ $post->id }}')" class="text-white p-2"> Delete </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</div>