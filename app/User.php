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

    public function plays()
    {
        return $this->hasMany('App\Play');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function followers()
    {
        return $this->hasMany('App\Following', 'following_id');
    }

    public function followings()
    {
        return $this->hasMany('App\Following');
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

    public function notifBy(){
        return $this->hasMany('App\Notification', 'notif_by');
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
