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
		$questionset = QuestionSet::find($request->id);

		
		return view('questionset.setsoal', compact('questionset'));
	}

	function store(Request $request){
		// dd($request->mapel);
		if ($request->token == '') {
			$token = 0;
		}else{
			$token = $request->token;
		}
		$id = QuestionSet::updateOrCreate(['id' => $request->id],[
			'name' => $request->name,
			'token' => $token,
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

	function postedquestion(Request $request){
		$request_per_page = 9;
		$postedquestion = QuestionSet::where('post', '1')->where('user_id', Auth::user()->id)->paginate($request_per_page);
		if ($request->page) {
			return [
			'post' => view('partials.questionset2')->with(compact('postedquestion'))->render(),
			'requestpage' => $postedquestion->nextPageUrl(),
			];
		}
		return view('partials.questionset', compact('postedquestion'));
	}

	function archivequestion(Request $request){
		$request_per_page = 9;
		$postedquestion = QuestionSet::where('post', '0')->where('user_id', Auth::user()->id)->paginate($request_per_page);
		if ($request->page) {
			return [
			'post' => view('partials.questionset2')->with(compact('postedquestion'))->render(),
			'requestpage' => $postedquestion->nextPageUrl(),
			];
		}
		return view('partials.questionset', compact('postedquestion'));
	}

	function inputtoken($id){
		$idsoal = $id;
		return view('questionset.inputtoken', compact('idsoal'));
	}

	function checktoken(Request $request){
		$questionset = QuestionSet::find($request->id);
		if ($questionset->token != $request->token) {
			return 'Token Salah';
		}else{
			return 'match';
		}
	}
}
