<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $table = 'tbl_users';
    public $timestamps = true;
    protected $primaryKey = 'user_id';
    protected $fillable = ['name', 'email', 'password',];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime',];
    public function postsRealtion() {
        return $this->hasMany(Post::class, 'user_id');
    }
    public function posts() {
        return $this->postsRealtion;

    }
}
