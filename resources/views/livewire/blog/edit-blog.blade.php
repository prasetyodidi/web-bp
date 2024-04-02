<div class="max-w-3xl mx-auto p-9 bg-gray-800 rounded-md shadow-md my-16">
    <h2 class="text-2xl font-semibold text-white mb-6">Create New Post</h2>
    {{-- @foreach ($categories as $item) --}}
        {{-- @dd($categories) --}}
    {{-- @endforeach --}}
    <form wire:submit="update">
        <div class="mb-4">
            <label for="title" class="block text-gray-300 text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" wire:model="title" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 bg-gray-700 text-white">
            @error('title') <span class="text-white"> {{$message}} </span> @enderror
        </div>
        <div class="mb-4">
            <label for="cover" class="block text-gray-300 text-sm font-bold mb-2">Cover</label>
            <input type="file" wire:model="cover" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 bg-gray-700 text-white">
            @error('cover') <span class="text-white"> {{$message}} </span> @enderror
        </div>
        <div class="mb-4">
            <select wire:model="category" class="w-32 px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 bg-gray-700 text-white">
                <option value="" disabled="disabled" selected > Category </option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <!-- TODO using CKEditor / WYSIWYG -->
            <label for="content" class="block text-gray-300 text-sm font-bold mb-2">Content</label>
            <textarea id="content" wire:model="content" rows="4" placeholder="Your content" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 bg-gray-700 text-white"></textarea>
            @error('content') <span class="text-white" > {{$message}} </span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
            Send Message
        </button>
    </form>
</div>