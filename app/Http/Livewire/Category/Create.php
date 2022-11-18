<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $saveSuccess = false;
    public $category;
    protected $rules = ['category.title' => 'required|min:6', 'category.description' => 'required|min:6'];
    public function mount() {

        $this->category = new Category;

    }

    public function saveCategory ()
    {
        $this->validate();
        $this->category->slug = Str::slug($this->category->title);
        $this->category->save();
        $this->saveSuccess = true;
    }

    public function render ()
    {
        return view('livewire.category.create')->extends('layout')->section('content');
    }
}
