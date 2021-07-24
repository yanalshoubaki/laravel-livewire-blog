<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class All extends Component
{
    public $posts;

    public function mount(){
        $this->posts = Post::all();
    }
    public function render()
    {
        return view('livewire.post.all')->extends('layout')->section('content');
    }
}
