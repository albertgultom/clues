<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model
{
	protected $guarded = [];
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function questions()
	{
		return $this->hasMany('App\Question');
	}
	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
	public function likes()
	{
		return $this->hasMany('App\Like');
	}
	public function plays()
	{
		return $this->hasMany('App\Play');
	}
	
	public function notifications()
	{
		return $this->hasMany('App\Notification');
	}

}
