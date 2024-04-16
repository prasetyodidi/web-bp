<div>
    <div class="grid grid-cols-3 place-items-center m-8 gap-8">
        @foreach ($posts as $post)
        <div class="">
            <div class="w-80 p-3 bg-gray-800 rounded-lg shadow-md">
                <img class="w-full h-40 object-cover rounded-t-lg" alt="Card Image" src="{{ asset('storage/' . $post->cover) }}">
                <div class="p-4">
                    <h2 class="text-xl text-white font-semibold">{{ $post->title }}</h2>
                    <p class="text-white"> {{ Str::limit($post->content, 50) }}</p>
                    <div class="flex">
                        <a wire:navigate href="blog/read/{{$post->id}}"><button type="button" class="text-white bg-slate-500 p-2 rounded-lg">Detail Post</button></a>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <button type="button" wire:click="Like('{{ $post->id }}')" class="flex items-center">
                            <svg wire:loading.delay.remove class="w-6 h-6 {{ optional(auth()->user())->isLiked($post) ? 'text-red-600' : 'text-white' }} " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none"><path fill="currentColor" d="m15 10l-.986-.164A1 1 0 0 0 15 11v-1ZM4 10V9a1 1 0 0 0-1 1h1Zm16.522 2.392l.98.196l-.98-.196ZM6 21h11.36v-2H6v2ZM18.56 9H15v2h3.56V9Zm-2.573 1.164l.805-4.835L14.82 5l-.806 4.836l1.973.328ZM14.82 3h-.214v2h.214V3Zm-3.543 1.781L8.762 8.555l1.664 1.11l2.516-3.774l-1.665-1.11ZM7.93 9H4v2h3.93V9ZM3 10v8h2v-8H3Zm17.302 8.588l1.2-6l-1.96-.392l-1.2 6l1.96.392ZM8.762 8.555A1 1 0 0 1 7.93 9v2a3 3 0 0 0 2.496-1.336l-1.664-1.11Zm8.03-3.226A2 2 0 0 0 14.82 3v2l1.972.329ZM18.56 11a1 1 0 0 1 .981 1.196l1.961.392A3 3 0 0 0 18.561 9v2Zm-1.2 10a3 3 0 0 0 2.942-2.412l-1.96-.392a1 1 0 0 1-.982.804v2ZM14.606 3a4 4 0 0 0-3.329 1.781l1.665 1.11A2 2 0 0 1 14.606 5V3ZM6 19a1 1 0 0 1-1-1H3a3 3 0 0 0 3 3v-2Z"/><path stroke="currentColor" stroke-width="2" d="M8 10v10"/></g></svg>
                        <span class="ml-2 text-gray-600">
                                <p class="text-white">{{$post->likes->count()}}</p>
                            </span>
                        </button>
                        <button type="button" wire:click="Dislike('{{ $post->id }}')" class="flex items-center">
                            <svg wire:loading.delay.remove class="w-6 h-6 {{ optional(auth()->user())->isDislikedd($post) ? 'text-red-600' : 'text-white' }} " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path fill="currentColor" fill-opacity=".89" fill-rule="evenodd" d="M15.807.939c.396.367.655 1.133.706 1.595c.59.366 1.288 1.104 1.349 2.494c1.053.731 1.853 2.083.854 4.06c.58.54 1.227 2.188.395 3.516c-.969 1.552-3.075 1.66-5.174 1.383c.56 1.565.77 3.009-.116 4.488C12.94 19.787 11.724 20 11.308 20c-1.138 0-1.918-.979-2.234-2.283c-.115-.364-.246-1.224-.297-1.45c-.265-1.44-1.156-2.592-2.67-3.453a11.392 11.392 0 0 0-2.123-.946h-2.34c-.521 0-1.144-.527-1.144-1.165V3.067c.074-.722.475-1.082 1.202-1.082h3.11c1.364-.31 2.724-.642 4.079-.995C10.2.637 10.487.52 11.403.268c2.053-.532 3.478-.24 4.404.67Zm-2.382.424c-.819 0-1.856.252-2.316.399c-.162.051-.446.135-.745.221l-.3.087l-.288.082l-.56.158s-1.41.378-4.173 1.02c-.103.012-.158.02-.166.022v7.38c1.511.582 2.688 1.288 3.53 2.118c1.264 1.244 1.615 2.368 1.822 3.807c.118.723.309 1.306.597 1.705a.65.65 0 0 0 .342.251c.147.047.35.05.783-.184c.433-.236.99-.853 1.095-1.772c.07-.893-.17-1.667-.492-2.481a15.705 15.705 0 0 0-.357-.822c-.218-.413.11-1.099.786-.95c.906.255 3.154.6 4.422 0c.737-.427.92-1.116.547-2.066a1.74 1.74 0 0 0-.495-.553c-.17-.102-.502-.544-.103-1.045c.396-.635.975-1.928-.49-2.734a.656.656 0 0 1-.34-.57c-.02-.274.024-1.29-.73-1.744c-.18-.097-.397-.177-.52-.41c-.078-.154-.103-.528-.103-.528c-.103-.632-.245-1.222-1.746-1.391ZM3.519 3.348H1.861v7.157h1.658V3.348Z"/></svg>
                        <span class="ml-2 text-gray-600">
                                <p class="text-white">{{$post->dislikes->count()}}</p>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
</div>