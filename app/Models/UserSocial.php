<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    use HasFactory;
    public $table = 'user_socials';
    protected $primaryKey = 'id';

    public $timestamps = true;
    protected $fillable = ['user_id', 'website', 'link'];
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
