<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class View extends Component
{
    public function render()
    {
        return view('livewire.category.view')->extends('layout')->section('content');
    }
}
