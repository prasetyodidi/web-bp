<div>
    <div class="m-8">
        <h1 class="text-white text-xl">{{ $post->title }}</h1>
        <img src="{{ asset('storage/' . $post->cover) }}">
        <p class="text-white">{{ $post->content }}</p>
    </div>
</div>
