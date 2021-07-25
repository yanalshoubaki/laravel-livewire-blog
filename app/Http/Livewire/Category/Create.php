<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $saveSuccess = false;
    public $category_title = '', $category_content = '';
    public $category;
    protected $rules = ['category_title' => 'required|min:6', 'category_content' => 'required|min:6'];
    public function mount() {
        $this->category = new Category;

    }

    public function saveCategory ()
    {
        $this->validate();
        $category_title = $this->category_title;
        $category_content = $this->category_content;
        $this->category->category_title = $category_title;
        $this->category->category_description =$category_content;
        $this->category->category_slug = Str::slug($category_title);
        $this->category->category_status = 1;
        $this->category->save();
        $this->saveSuccess = true;
    }

    public function render ()
    {
        return view('livewire.category.create')->extends('layout')->section('content');
    }
}
