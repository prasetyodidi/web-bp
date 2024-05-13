<div>
    <div class="flex justify-center">
        <h1 class="text-third-blue text-6xl font-bold">Blog Site</h1>
    </div>
    <div class="flex justify-center mt-12 gap-5">
        @foreach ($tags as $tag)
            <button class="rounded-full w-20 border-4 bg-white border-third-blue">{{ $tag->name }}</button>
        @endforeach
    </div>
    <div class="flex justify-center mt-12">
        <div class="">
            <img src="https://dummyimage.com/550x300/000/fff" alt="">
        </div>
        <div class="flex m-3 gap-3 flex-col">
            <div class="flex gap-1">
                <p class="text-third-blue font-semibold">Bakaran Project</p>
                <p>•</p>
                <p class="text-third-blue">2024 01 01</p>
            </div>
            <div class="w-[500px]">
                <p class="text-2xl font-extrabold text-third-blue">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Quaerat, iste!</p>
                <div class="w-[600px] mt-5 text-lg">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque in quas blanditiis adipisci dicta
                        inventore doloremque consequatur et voluptas ea.</p>
                </div>
            </div>
            <div class="flex justify-center mt-16 gap-4">
                <button class="w-32 rounded-md bg-third-blue text-white">Aw</button>
                <button class="w-32 rounded-md bg-third-blue text-white">Aw</button>
                <button class="w-32 rounded-md bg-third-blue text-white">Aw</button>
            </div>
        </div>
    </div>
    <div class="grid grid-rows-2 mt-12 place-items-center gap-5 grid-cols-3">
        @foreach ($posts as $post)
            <div class="flex-col">
                <img class="object-cover h-52 w-80" src="{{ asset('storage/' . $post->cover) }}" alt="">
                <div class="flex gap-2 w-[300px] justify-center">
                    <p class="text-lg">{{ $post->owner->name }}</p>
                    <p class="text-lg">•</p>
                    <p class="text-lg">{{ $post->created_at->toDateString() }}</p>
                </div>
                <div class="w-[300px]">
                    <a wire:navigate href="blog/read/{{ $post->id }}">
                        <p class="text-2xl">{{ $post->title }}</p>
                    </a>
                    <p>{{ Str::limit($post->content, 50) }}</p>
                </div>
                {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, neque!</p> --}}
                {{-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga mollitia minima tenetur excepturi laborum maxime autem, minus cum odio saepe!</p> --}}
                <div class="flex justify-between">
                    @foreach ($post->tags as $tag)
                        <button disabled class="w-20 rounded-md bg-third-blue text-white">{{ $tag->name }}</button>
                    @endforeach
                </div>
            </div>
        @endforeach
        {{-- <div class="flex-col">
            <img src="https://dummyimage.com/320x200/000/fff" alt="">
            <div class="flex gap-2 w-[300px]">
                <p class="text-lg">Bakaran Project</p>
                <p class="text-lg">•</p>
                <p class="text-lg">2024-01-01</p>
            </div>
            <div class="w-[300px]">
                <p>Lorem ipsum dolor sit amet.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, eligendi.</p>
            </div>
            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, neque!</p> --}}
        {{-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga mollitia minima tenetur excepturi laborum maxime autem, minus cum odio saepe!</p> --}}
        {{-- <div class="flex justify-between">
                <button class="w-20 rounded-none bg-third-blue text-white">Aw</button>
                <button class="w-20 rounded-none bg-third-blue text-white">Aw</button>
                <button class="w-20 rounded-none bg-third-blue text-white">Aw</button>
            </div>
        </div> --}}
    </div>
</div>
