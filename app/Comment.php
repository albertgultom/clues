<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = [];
	
	public function questionset()
	{
		return $this->belongsTo('App\QuestionSet');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
