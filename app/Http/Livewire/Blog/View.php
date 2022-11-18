<?php

namespace App\Http\Livewire\Blog;

use App\Models\Comment;
use App\Models\Blog;
use Livewire\Component;

class View extends Component
{
    public $blog, $comments, $replyingTo, $comment_content, $blog_id, $comment_parent;
    protected $rules = ['comment_content' => 'string|required|min:5',];

    public function mount (Blog $blog)
    {
        $this->blog = $blog;
        $this->comments = $this->blog->Comment;
        $this->replyingTo = '';

    }

    public function addComments ()
    {
        $this->validate();
        $comment = new Comment;
        $comment->blog_id = $this->blog->blog_id;
        $comment->user_id = auth()->user() != null ? auth()->user()->user_id : 0;
        $comment->comment_content = $this->comment_content;
        $comment->comment_parent = 0;
        $comment->save();
        $this->reset(['blog_id', 'comment_content', 'comment_parent']);
        $this->replyingTo = '';
        $this->reply = '';

        $blog = Blog::find($this->blog->blog_id);
        $this->comments = $blog->comments();
    }

    public function render ()
    {
        return view('livewire.blog.view')->extends('layout')->section('content');
    }
}
