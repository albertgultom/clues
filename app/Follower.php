<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
	protected $guarded = [];

	public function user(){
		return $this->belongsTo('App\User');
	}
	
	public function users()
	{
		return $this->belongsToMany('App\User', 'follower_user', 'user_id', 'follower_id');
	}

}
