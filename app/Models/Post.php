<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $table = 'tbl_posts';
    protected $primaryKey = 'post_id';

    public $timestamps = true;
    protected $fillable = ['category_id', 'author_id', 'post_title', 'post_content', 'post_slug', 'post_image', 'post_status'];
    protected $hidden = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public function userRelation() {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function user() {
        return $this->userRelation;
    }
    public function categoryRelation() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function category() {
        return $this->categoryRelation;
    }
    public function commentsRelation() {
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function comments() {
        return $this->commentsRelation;
    }
}
