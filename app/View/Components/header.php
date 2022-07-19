<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class header extends Component
{


    public User $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('blog');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
