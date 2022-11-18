<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class All extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = Blog::all();
    }

    public function render()
    {
        return view('livewire.blog.all')->extends('layout')->section('content');
    }
}
