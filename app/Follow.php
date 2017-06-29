<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
	protected $guarded = [];
	
	public function user()
	{
		return $this->belongsTo('App\User', 'follower_id');
	}
	public function user()
	{
		return $this->belongsTo('App\User', 'following_id');
	}

}
