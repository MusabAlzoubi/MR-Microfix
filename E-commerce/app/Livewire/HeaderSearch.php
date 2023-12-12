<?php

namespace App\Livewire;

use Livewire\Component;

class HeaderSearch extends Component
{
    public $q;

    public function mount()
    {
        $this->fill(request()->only('q'));

    }
    public function render()
    {
        return view('livewire.header-search');
    }
}
