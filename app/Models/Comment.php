<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $table = 'tbl_comments';
    protected $primaryKey = 'comment_id';

    public $timestamps = true;
    protected $fillable = ['post_id', 'user_id', 'comment_content', 'comment_parent'];
    protected $hidden = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
