<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{

    public $posts;
    public $latest = false, $feed = true;
    public function mount() {
        $this->posts = new Post;
        if (\Route::is('blog.feed')) {
            $this->feed = true;
            $this->latest = false;
            $this->posts = $this->posts->all()->all();
        } elseif(\Route::is('blog.latest')) {
            $this->latest = true;
            $this->feed= false;
            $this->posts = $this->posts->orderBy('created_at', 'asc')->get();

        } else {
            $this->feed = true;
            $this->latest = false;
            $this->posts = $this->posts->all()->all();
        }
    }

    public function render()
    {
        return view('livewire.blog', ['posts' => $this->posts])
            ->extends('layout')
            ->section('content');
    }
}
