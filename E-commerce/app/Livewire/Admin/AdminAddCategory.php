<?php

namespace App\Livewire\Admin;
use App\Models\Category;

use Livewire\Component;

class AdminAddCategory extends Component
{

    public $name;
    public $slug;
    public $img;

    public function render()
    {
        return view('livewire.admin.admin-add-category');    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;

        if ($this->img) {
            // Handle image upload logic and save the path to the database
            // For simplicity, you may use a package like Intervention Image
        }

        $category->save();

        // Clear input fields after saving
        $this->reset(['name', 'slug', 'img']);

        session()->flash('success', 'Category added successfully.');
    }
  
}
