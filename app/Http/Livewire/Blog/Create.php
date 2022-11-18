<?php

    namespace App\Http\Livewire\Blog;

    use App\Models\Category;
    use App\Models\Blog;
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
        public $blog;
        public $categories;
        public $image;
        protected $rules = [
            'blog.title'       => 'required|min:6',
            'blog.content'     => 'required|min:6',
            'image'            => 'required|image|max:2048',
            'blog.category_id' => 'required',
        ];
        public function mount()
        {
            $this->blog = new Blog();
            $this->categories = Category::all();
        }

        public function saveBlog()
        {
            $this->validate();
            $imageName = random_int(500, 999) * time() . '.' . $this->image->extension();
            $filePath = Storage::disk('public')->putFileAs('images', $this->image, $imageName);
            $this->blog->image = $imageName;
            $this->blog->slug = Str::slug($this->blog->title);
            $this->blog->user_id = auth()->id();
            $this->blog->summary = Str::limit($this->blog->content, 150, '...');
            $this->blog->save();
            $this->saveSuccess = true;
        }

        public function render()
        {
            return view('livewire.blog.create')->extends('layout')->section('content');
        }
    }
