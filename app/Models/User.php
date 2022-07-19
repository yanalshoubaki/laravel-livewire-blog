<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable   = ['name', 'username', 'email', 'password', 'is_admin', 'status', 'bio', 'avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['remember_token',];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime',];



    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function social()
    {
        return $this->hasMany(UserSocial::class);
    }
}
