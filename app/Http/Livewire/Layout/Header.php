<?php

namespace App\Http\Livewire\Layout;

use App\Models\User;
use Livewire\Component;

class Header extends Component
{


    public User $user;


    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.layout.header');
    }
}
