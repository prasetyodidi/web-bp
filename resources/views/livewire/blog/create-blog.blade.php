<div class="ml-8 mt-6">
    <p class="text-5xl font-bold text-left text-third-blue w-[217px]">New Post</p>
    <hr class="bg-third-blue w-[212px] h-1">
    <div class="bg-gray-100 mt-10 w-[1000px] p-4 rounded-lg shadow-md">
        @if ($currentStep == 1)
            <div class="mb-4">
                <label for="image" class="text-gray-700 font-semibold mb-2">Image</label>
                <input type="file" name="image" id="image" class="w-full hidden">
                <button type="button" class="bg-steelblue text-white w-full h-20 border rounded-lg p-2 cursor-pointer"
                        onclick="document.getElementById('image').click()">
                    Drag & Drop file or browse your computer
                </button>
            </div>
            <div class="mb-4">
                <label for="title" class="text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full border rounded-lg p-2">
            </div>
            <div class="mb-4">
                <label for="body" class="text-gray-700 font-semibold mb-2">Body</label>
                <textarea name="body" id="body" rows="4" class="w-full border rounded-lg p-2"></textarea>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-500">Step {{ $currentStep }} / {{ $totalStep }}</span>
                <button wire:click="nextStep" class="bg-third-blue text-white px-10 py-1 rounded-md">Next</button>
            </div>
    </div>
    @elseif ($currentStep == $totalStep)
        <div class="mb-4">
            <label for="tag" class="text-gray-700 font-semibold mb-2">Tag</label>
            <div wire:ignore>
                <select name="tag" wire:model="selectedTag" multiple
                        class="form-select multidropdown block w-full mt-1">
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <button class="text-gray-700 border font-bold py-2 px-4 rounded">Save Draft</button>
            </div>
            <div>
                <label for="category" class="block text-gray-700 font-semibold mb-2">Category</label>
                <div class="bg-white p-4">
                    <div class="flex space-x-8 mb-6">
                        <p>All Categories</p>
                        <p>Popular</p>
                    </div>
                    <hr class="mb-4">
                    @foreach ($categories as $item)
                        <div class="flex items-center mb-4">
                            <input type="checkbox" name="category[]" value="{{ $item->id }}"
                                   id="{{ 'category-' . $item->id }}" class="form-checkbox h-5 w-5 text-blue-600"><span
                                class="ml-2 text-gray-700">{{ $item->name }}</span>
                        </div>
                    @endforeach
                    <a href="">+ New Category</a>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-gray-500">Step {{ $currentStep }} / {{ $totalStep }}</span>
            <button wire:click="save" class="bg-third-blue text-white px-10 py-1 rounded-md">Publish</button>
        </div>
    @endif
</div>

@script
<script>
    $('.multidropdown').select2()
</script>
@endscript
