<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable   = [
        'category_id',
        'user_id',
        'title',
        'content',
        'summary',
        'slug',
        'image',
        'status',
        'views'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categry()
    {
        return $this->belongsTo(Category::class);
    }
}
