<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class AdminCategory extends Component
{
    use WithPagination;


    public function render()
    {

        $category = Category::orderBy('name' , 'ASC' )->paginate(5);
        return view('livewire.admin.admin-category',['category'=>$category]);
    }
}
