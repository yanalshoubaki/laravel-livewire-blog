<?php

namespace App\Http\Livewire\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $saveSuccess = false;
    public $post_title ='', $post_image, $post_content='', $post_category;
    public $post;
    public $category;
    protected $rules = [
        'post_title' => 'required|min:6',
        'post_content' => 'required|min:6',
        'post_category' => 'required',
        'post_image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048'];

    public function mount() {
        $this->post = new Post;

    }

    public function savePost ()
    {
        $this->validate();
        $post_content = $this->post_content;
        $post_title = $this->post_title;
        $post_image = $this->post_image;
        $post_category = $this->post_category;
        $imageName = random_int(500, 999) * time() . '.' . $post_image->extension();
        $filePath = Storage::disk('public')->putFileAs('images', $post_image, $imageName);
        $this->post->post_title = $post_title;
        $this->post->post_content =$post_content;
        $this->post->post_image = URL::to('/') . '/storage/' . $filePath;
        $this->post->post_slug = Str::slug($post_title);
        $this->post->post_status = 1;
        $this->post->author_id = auth()->user()->user_id;
        $this->post->category_id = $post_category;
        $this->post->post_view = 0;
        $this->post->post_summary = Str::limit($post_content, 150, '...');
        $this->post->save();
        $this->saveSuccess = true;
    }

    public function render ()
    {
        $this->category = Category::all();
        return view('livewire.post.create', ['category' => $this->category])->extends('layout')->section('content');
    }
}
