<?php

namespace App\Livewire;

use Livewire\Component;

class Shop extends Component
{
    public function render()
    {
        $this->layout = 'user-interface.layouts.app';
        return view('livewire.shop');
    }
}
