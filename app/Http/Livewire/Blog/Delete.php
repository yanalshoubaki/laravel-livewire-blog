<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;

class Delete extends Component
{
    public function render()
    {
        return view('livewire.blog.delete')->extends('layout')->section('content');
    }
}
