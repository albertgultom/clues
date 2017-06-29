<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionSet;
use Illuminate\Support\Facades\Auth;

class QuestionSetController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function setsoal(){
		return view('questionset.setsoal');
	}

	function store(Request $request){
		$id = QuestionSet::create([
			'name' => $request->name,
			'level' => $request->level,
			'study_name' => $request->mapel,
			'time' => $request->time,
			'user_id' => Auth::user()->id
			])->id;
		return redirect('question/'.$id.'/create');
	}
}
