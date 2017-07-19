<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionSet;
use App\Like;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class QuestionSetController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function setsoal(Request $request){
		if ($request->id != '') {
			$questionset = QuestionSet::find($request->id);
		}else{
			$questionset = QuestionSet::find($request->id);
		}
		
		return view('questionset.setsoal', compact('questionset'));
	}

	function store(Request $request){
		$id = QuestionSet::updateOrCreate(['id' => $request->id],[
			'name' => $request->name,
			'level' => $request->level,
			'study_name' => $request->mapel,
			'time' => $request->time,
			'user_id' => Auth::user()->id
			])->id;
		if ($request->id != '') {
			return redirect('user');
		}else{
			return redirect('question/'.$id.'/create');
		}
	}

	function posting(Request $request){
		$posting = QuestionSet::find($request->id)->update([
			'post' => '1'
			]);
	}

	function archive(Request $request){
		$posting = QuestionSet::find($request->id)->update([
			'post' => '0'
			]);
	}

	function like(Request $request){
		$cek = Like::where('question_set_id', $request->question_set_id)
		->where('user_id', Auth::user()->id)->count();

		if ($cek == 1) {
			Like::where('question_set_id', $request->question_set_id)
			->where('user_id', Auth::user()->id)->delete();
			Notification::where('user_id', $request->user_id)->where('notif_by', Auth::user()->id)->where('question_set_id', $request->question_set_id)->delete();
		}else{
			Like::create([
				'question_set_id' => $request->question_set_id,
				'user_id' => Auth::user()->id
				]);
			Notification::create([
				'user_id' => $request->user_id,
				'notif_by' => Auth::user()->id,
				'type' => 'like',
				'question_set_id' => $request->question_set_id
				]);
		}
	}

	function postedquestion($id){
		$postedquestion = QuestionSet::where('post', '1')->where('user_id', $id)->get();
		return view('partials.questionset', compact('postedquestion'));
	}

	function archivequestion($id){
		$postedquestion = QuestionSet::where('post', '0')->where('user_id', $id)->get();
		return view('partials.questionset', compact('postedquestion'));
	}
}
