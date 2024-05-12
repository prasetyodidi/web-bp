<div class="ml-8 mt-6">
    <p class="text-5xl font-bold text-left text-third-blue flex-row">Create Post</p>
    <hr class="bg-third-blue w-64 h-1">
    <div class="gap-4">

        <form wire:submit="save">
            <div>
                <input class="w-32 h-32" type="file" name="cover" id="cover">
                <label for="cover" class="bg-steelblue">Drag & Drop file or browse in your computer</label>
            </div>
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>
            <button type="submit"></button>
        </form>
    </div>
</div>
