<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
	protected $guarded = [];

	public function user(){
		return $this->belongsTo('App\User');
	}
	
	public function users()
	{
		return $this->belongsToMany('App\User', 'following_user', 'user_id', 'following_id');
	}

}
