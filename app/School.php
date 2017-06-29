<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	protected $guarded = [];
	
	public function users()
	{
		return $this->hasMany('App\User');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
