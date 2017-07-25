<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
	protected $guarded = [];

	public function following(){
		return $this->belongsTo('App\User', 'following_id');
	}

	public function follower()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

}
