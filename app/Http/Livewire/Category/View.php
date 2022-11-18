<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class View extends Component
{
    public $category;
    public function mount(Category $category){
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.category.view')->extends('layout')->section('content');
    }
}
