<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = 'tbl_category';
    protected $primaryKey = 'category_id';

    public $timestamps = true;
    protected $fillable = ['category_parent', 'category_title', 'category_description', 'category_slug','category_status'];
    protected $hidden = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public function postRelation() {
        return $this->hasMany(Post::class, 'category_id');
    }
    public function post() {
        return $this->postRelation;
    }

}
