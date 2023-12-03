<!-- resources/views/livewire/admin/add-category.blade.php -->

<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" wire:model="name" class="form-control" id="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="slug">Category Slug:</label>
            <input type="text" wire:model="slug" class="form-control" id="slug">
            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="img">Category Image:</label>
            <input type="file" wire:model="img" class="form-control-file" id="img">
            @error('img') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
