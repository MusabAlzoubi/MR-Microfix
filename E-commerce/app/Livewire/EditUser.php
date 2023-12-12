<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{
    public $user;
    public $name;
    public $mobile;
    public $address;

    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        // $this->mobile = $user->mobile;
        // $this->address = $user->address;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $this->user->update([
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
        ]);

        session()->flash('success', 'User information updated successfully.');

        // إرسال رسالة نجاح وإعادة توجيه إلى صفحة الشيكاوت
        return redirect()->route('shop.chekout');
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}


