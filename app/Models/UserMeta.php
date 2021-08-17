<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;
    public $table = 'tbl_users_meta';
    protected $primaryKey = 'meta_id';

    public $timestamps = true;
    protected $fillable = ['user_id', 'meta_key', 'meta_value'];
    protected $hidden = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public function userRelation ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user() {
        return $this->userRelation;
    }
}
