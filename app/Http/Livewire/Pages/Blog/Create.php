<?php

namespace App\Http\Livewire\Pages\Blog;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.pages.blog.create')->extends('layout')->section('content');
    }
}
