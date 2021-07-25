<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class View extends Component
{
    public $category;
    public function mount(){

        $this->category = Category::where('category_slug', request()->route('slug'))->first();
    }
    public function render()
    {
        return view('livewire.category.view')->extends('layout')->section('content');
    }
}
