<?php

namespace App\Http\Livewire\Post;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class View extends Component
{
    public $post, $comments, $replyingTo, $comment_content, $post_id, $comment_parent;
    protected $rules = ['comment_content' => 'string|required|min:5',];

    public function mount ($slug)
    {
        $this->post = Post::where('post_slug', $slug)->first();
        $this->comments = $this->post->comments();
        $this->replyingTo = '';

    }

    public function addComments ()
    {
        $this->validate();
        $comment = new Comment;
        $comment->post_id = $this->post->post_id;
        $comment->user_id = auth()->user() != null ? auth()->user()->user_id : 0;
        $comment->comment_content = $this->comment_content;
        $comment->comment_parent = 0;
        $comment->save();

        $this->reset(['post_id', 'comment_content', 'comment_parent']);

        $this->replyingTo = '';
        $this->reply = '';

        $post = Post::find($this->post->post_id);
        $this->comments = $post->comments();
    }

    public function render ()
    {
        return view('livewire.post.view')->extends('layout')->section('content');
    }
}
