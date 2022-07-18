<?php

namespace App\Http\Livewire\Pages\Blog;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $posts;
    public $latest = false, $feed = true;
    public function mount()
    {
        $this->posts = Post::query();
        if (\Route::is('blog.feed')) {
            $this->feed = true;
            $this->latest = false;
            $this->posts = $this->posts->latest()->get();
        } elseif (\Route::is('blog.latest')) {
            $this->latest = true;
            $this->feed = false;
            $this->posts = $this->posts->orderBy('created_at', 'asc')->get();
        } else {
            $this->feed = true;
            $this->latest = false;
            $this->posts = $this->posts = $this->posts->latest()->get();
        }
    }

    public function render()
    {
        return view('livewire.pages.blog.home')->extends('layout')->section('content');
    }
}
