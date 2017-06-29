<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $guarded = [];
	
	public function questionset()
	{
		return $this->belongsTo('App\QuestionSet');
	}
}
