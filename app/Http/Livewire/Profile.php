<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    public $user;

    public function mount() {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.profile')->extends('livewire.settings')->section('settings');
    }
}
