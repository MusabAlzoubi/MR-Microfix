<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class BrowseCategories extends Component
{
    public function render()
    {
        $category = Category::orderBy('name', 'Asc')->get();

        return view('livewire.browse-categories', [ 'category'=>$category]);
    }
}
