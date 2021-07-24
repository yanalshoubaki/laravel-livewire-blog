<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class All extends Component
{
    public $categories;

    public function mount(){
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.category.all')->extends('layout')->section('content');
    }
}
