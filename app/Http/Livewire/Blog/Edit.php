<?php

namespace App\Http\Livewire\Blog;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $saveSuccess = false;
    public $blog;
    public $categories;
    public $image;
    protected $rules = [
        'blog.title'       => 'required|min:6',
        'blog.content'     => 'required|min:6',
        'image'            => 'required|image|max:2048',
        'blog.category_id' => 'required',
    ];

    public function mount(Blog $blog) {
        $this->blog = $blog;
        $this->categories = Category::all();

    }

    public function saveBlog ()
    {
        $this->validate();
        if (!is_string($this->blog_image)) {
            $blog_image = $this->blog_image;
            $imageName = random_int(500, 999) * time() . '.' . $blog_image->extension();
            $filePath = Storage::disk('public')->putFileAs('images', $blog_image, $imageName);
            $this->blog->blog_image = URL::to('/') . '/storage/' . $filePath;
        }
        $this->blog->slug = Str::slug($this->blog->title);
        $this->blog->user_id = auth()->id();
        $this->blog->summary = Str::limit($this->blog->content, 150, '...');
        $this->blog->save();
        $this->saveSuccess = true;
    }


    public function render()
    {

        return view('livewire.blog.edit')->extends('layout')->section('content');
    }
}
