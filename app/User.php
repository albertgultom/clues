<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function schools()
    {
        return $this->hasMany('App\School');
    }

    public function questionsets()
    {
        return $this->hasMany('App\QuestionSet');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function followers()
    {
        return $this->belongsToMany('App\Follow', 'follow_user', 'user_id', 'follower_id');
    }
    
    public function following()
    {
        return $this->belongsToMany('App\Follow', 'follow_user', 'user_id', 'following_id');
    }


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'status', 'password', 'username', 'avatar', 'school_id', 'biography', 'premium', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];
}
