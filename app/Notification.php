<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $guarded = [];
	
	public function notifBy()
	{
		return $this->belongsTo('App\User', 'notif_by');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function questionset()
	{
		return $this->belongsTo('App\QuestionSet', 'question_set_id');
	}
}
