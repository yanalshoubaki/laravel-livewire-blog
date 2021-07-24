<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class View extends Component
{
    public $post;

    public function mount($slug){
        $this->post = Post::where('post_slug', $slug)->first();
    }
    public function render()
    {
        return view('livewire.post.view')->extends('layout')->section('content');
    }
}
