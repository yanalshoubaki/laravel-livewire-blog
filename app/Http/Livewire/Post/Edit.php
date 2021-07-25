<?php

namespace App\Http\Livewire\Post;

use App\Models\Category;
use App\Models\Post;
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
    public $post_title, $post_image, $post_content, $post_category;
    public $post;
    public $category;
    protected $rules = [
        'post_title' => 'required|min:6',
        'post_content' => 'required|min:6',
        'post_category' => 'required',
        'post_image' => 'sometimes|image|mimes:jpg,jpeg,png,svg,gif|max:2048|dimensions:max_width=1200,max_height=800'];

    public function mount() {
        $this->post = new Post;
        $this->post = $this->post->where('post_id', request()->route('id'))->first();
        $this->post_title = $this->post->post_title;
        $this->post_content = $this->post->post_content;
        $this->post_image = $this->post->post_image;
        $this->post_category = $this->post->category_id;
    }

    public function savePost ()
    {
        $this->validate();
        $post_content = $this->post_content;
        $post_title = $this->post_title;
        $post_category = $this->post_category;
        if (is_string($this->post_image)) {
            $post_image = $this->post_image;
            $this->post->post_image = $post_image;
        } else {
            $post_image = $this->post_image;
            $imageName = random_int(500, 999) * time() . '.' . $post_image->extension();
            $filePath = Storage::disk('public')->putFileAs('images', $post_image, $imageName);
            $this->post->post_image = URL::to('/') . '/storage/' . $filePath;
        }
        $this->post->post_title = $post_title;
        $this->post->post_content =$post_content;
        $this->post->post_slug = Str::slug($post_title);
        $this->post->post_status = 1;
        $this->post->author_id = auth()->user()->user_id;
        $this->post->category_id = $post_category;
        $this->post->save();
        $this->saveSuccess = true;
    }


    public function render()
    {
        $this->category = Category::all();

        return view('livewire.post.edit', ['category' => $this->category])->extends('layout')->section('content');
    }
}
