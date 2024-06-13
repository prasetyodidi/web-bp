<div class="ml-8 mt-6">
    <p class="text-5xl font-bold text-left text-third-blue">Post</p>
    <hr class="bg-third-blue w-28 h-0.5">
    <div class="flex items-center w-max space-x-16 mt-8">
        <label for="searching" class="text-2xl inline-block text-right font-medium text-third-blue">All Posts</label>
        <input type="search" name="searching" wire:model.live="search" class="h-8 rounded-[50px] w-[336px]">
        <a>
            <button class="text-white bg-third-blue rounded-lg px-10">
                Categories
            </button>
        </a>
        <a wire:navigate href="create">
            <button class="text-white bg-third-blue rounded-lg px-12">
                + Create
            </button>
        </a>
    </div>

    <div class="mt-10">
        @foreach ($posts as $post)
            <div class="mt-10 w-[1000px] h-[80px] bg-gray-300 rounded-md flex justify-between items-center">
                <div class="p-3 m2">
                    <p class="text-base text-third-blue font-medium">{{ $post->created_at->toDateString() }} |
                        @foreach ($post->categories as $category)
                            {{ $category->name }}
                        @endforeach
                    </p>
                    <a wire:navigate href="read/{{ $post->id }}">
                        <p class="text-xl font-bold text text-third-blue">{{ $post->title }}</p>
                    </a>
                </div>
                <div class="flex items-center mr-4 gap-8">
                    <button class="text-center text-gray-60 mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 items-center" viewBox="0 0 384 384">
                            <path fill="currentColor"
                                  d="M0 304L236 68l80 80L80 384H0v-80zM378 86l-39 39l-80-80l39-39q6-6 15-6t15 6l50 50q6 6 6 15t-6 15z"/>
                        </svg>
                        Edit
                    </button>
                    <button class="text-gray-60 mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 items-center" viewBox="0 0 26 26">
                            <path fill="currentColor"
                                  d="M11.5-.031c-1.958 0-3.531 1.627-3.531 3.594V4H4c-.551 0-1 .449-1 1v1H2v2h2v15c0 1.645 1.355 3 3 3h12c1.645 0 3-1.355 3-3V8h2V6h-1V5c0-.551-.449-1-1-1h-3.969v-.438c0-1.966-1.573-3.593-3.531-3.593h-3zm0 2.062h3c.804 0 1.469.656 1.469 1.531V4H10.03v-.438c0-.875.665-1.53 1.469-1.53zM6 8h5.125c.124.013.247.031.375.031h3c.128 0 .25-.018.375-.031H20v15c0 .563-.437 1-1 1H7c-.563 0-1-.437-1-1V8zm2 2v12h2V10H8zm4 0v12h2V10h-2zm4 0v12h2V10h-2z"/>
                        </svg>
                        Delete
                    </button>
                    <button class="text-gray-600 text-md mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 items-center" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M12.003 21q-1.866 0-3.51-.708q-1.643-.709-2.859-1.924q-1.216-1.214-1.925-2.856Q3 13.87 3 12.003q0-1.866.708-3.51q.709-1.643 1.924-2.859q1.214-1.216 2.856-1.925Q10.13 3 11.997 3q1.866 0 3.51.708q1.643.709 2.859 1.924q1.216 1.214 1.925 2.856Q21 10.13 21 11.997q0 1.866-.708 3.51q-.709 1.643-1.924 2.859q-1.214 1.216-2.856 1.925Q13.87 21 12.003 21ZM12 20q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm-3.385-4.615v-2.21l5.333-5.308q.148-.129.306-.19q.157-.062.315-.062q.171 0 .337.065q.166.064.302.193l.925.944q.123.148.187.308t.065.32q0 .159-.062.321q-.061.163-.19.31l-5.308 5.309h-2.21Zm5.96-4.985l.925-.956l-.925-.944l-.95.95l.95.95Z"/>
                        </svg>
                        Move to draft
                    </button>
                </div>
            </div>
        @endforeach

    </div>
</div>
