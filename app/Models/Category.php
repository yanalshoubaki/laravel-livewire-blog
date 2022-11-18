<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Category extends Model
    {
        use HasFactory;

        protected $fillable = [
            'title',
            'description',
            'slug',
        ];

        public function blog() {
            return $this->hasMany(Blog::class, "category_id");
        }


    }
