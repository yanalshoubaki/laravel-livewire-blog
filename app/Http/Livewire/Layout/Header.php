<?php

namespace App\Http\Livewire\Layout;

use App\Models\User;
use Livewire\Component;

class Header extends Component
{


    /**
     * User data
     *
     * @var User|null
     */
    public User|null $user;


    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.layout.header');
    }
}
