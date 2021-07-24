<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{

    public $posts;

    public function mount() {
        $this->posts = new Post;
    }

    public function render()
    {

        return view('livewire.blog', ['posts' => $this->posts->all()])->extends('layout')->section('content');
    }
}
