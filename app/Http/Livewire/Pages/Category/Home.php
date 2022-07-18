<?php

namespace App\Http\Livewire\Pages\Category;

use App\Models\Category;
use Livewire\Component;

class Home extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.pages.category.home')->extends('layout')->section('content');
    }
}
