<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Blog extends Model
    {
        use HasFactory;

        protected $fillable = [
            'title',
            'content',
            'summary',
            'slug',
            'image',
            'status',
            'views',
            'user_id',
            'category_id',
        ];

        public function User() {
            return $this->belongsTo(User::class, "user_id");
        }

        public function Category() {
            return $this->belongsTo(Category::class, "category_id");
        }

        public function Comment() {
            return $this->hasMany(Comment::class, 'blog_id');
        }

    }
