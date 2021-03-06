<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'slug',
        'status'
    ];
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
