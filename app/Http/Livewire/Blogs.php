<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Blogs extends Component
{

    public Collection $blogs;
    public string $type = "feed";

    public function mount()
    {
        $this->renderData();
    }

    public function renderData()
    {
        $this->blogs = Blog::all();
        if ($this->type == "feed") {
            $this->blogs = $this->blogs;
        } else if ($this->type == "latest") {
            $this->blogs = $this->blogs->sortBy(fn ($q) => $q->orderBy('created_at', 'desc'));
        }
    }

    public function setBlogDataType($type)
    {
        $this->type = $type;
        $this->renderData();
    }

    public function render()
    {
        return view('livewire.blog')->extends('layout')->section('content');
    }
}
