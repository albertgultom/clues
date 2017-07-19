<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\QuestionSet;
use App\Question;
use App\Like;
use App\Play;
use App\AnswerExam;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function create($id){
		$questionset = QuestionSet::find($id);
		if (Auth::user()->id == $questionset->user_id) {
			$questioncount = Question::where('question_set_id', $id)->count();
			// dd($questioncount);
			if ($questioncount == 0) {
				Question::create([
					'question_set_id' => $id
					]);
			}
			$questions = Question::where('question_set_id', $id)->get();
			return view('question.create', compact('questionset', 'questions'));
		}else{
			return redirect ('');
		}
	}

	// function edit($id){
	// 	$questionset = QuestionSet::find($id);
	// 	return view('questionset.edit', compact('questionset'));

	// }

	function store(Request $request){
		$for = $request->save_for;
		if ($for == 'question') {
			$saved = Question::where('id', $request->id)->update([
				'question' => $request->content
				]);
			if ($saved) {
				return 'saved';
			}
		}else if($for == 'option_a'){
			$saved = Question::where('id', $request->id)->update([
				'option_a' => $request->content
				]);
			if ($saved) {
				return 'saved';
			}
		}else if($for == 'option_b'){
			$saved = Question::where('id', $request->id)->update([
				'option_b' => $request->content
				]);
			if ($saved) {
				return 'saved';
			}
		}else if($for == 'option_c'){
			$saved = Question::where('id', $request->id)->update([
				'option_c' => $request->content
				]);
			if ($saved) {
				return 'saved';
			}
		}else if($for == 'option_d'){
			$saved = Question::where('id', $request->id)->update([
				'option_d' => $request->content
				]);
			if ($saved) {
				return 'saved';
			}
		}else if($for == 'option_e'){
			$saved = Question::where('id', $request->id)->update([
				'option_e' => $request->content
				]);
			if ($saved) {
				return 'saved';
			}
		}else if($for == 'penjelasan'){
			$saved = Question::where('id', $request->id)->update([
				'explanation' => $request->content
				]);
			if ($saved) {
				return 'saved';
			}
		}else if($for == 'answer_true'){
			$saved = Question::where('id', $request->id)->update([
				'answer_true' => $request->content
				]);
			if ($saved) {
				return 'saved';
			}
		}

	}

	function create_question($id){
		$idsoal = Question::create([
			'question_set_id' => $id
			])->id;
		return $idsoal;
	}

	function delete_question($id){
		$delete = Question::destroy($id);
		if ($delete) {
			return 'success';
		}
	}

	function delete($id){
		QuestionSet::destroy($id);
		return redirect ('user');
	}

	function play($id){
		$questionset = QuestionSet::find($id);
		$questions = Question::where('question_set_id', $id)->get();
		$like = Like::where('question_set_id', $id)
		->where('user_id', Auth::user()->id)->count();
		return view('question.play', compact('questions', 'questionset', 'like'));
	}

	function result(Request $request){
		$answertrue = Question::find($request->question_id)->answer_true;

		if ($request->answer == $answertrue) {
			$result = '1';
		}else{
			$result = '0';
		}

		$save = AnswerExam::updateOrCreate([
			'user_id' => $request->user_id,
			'question_set_id' => $request->question_set_id,
			'question_id' => $request->question_id,
			],
			[
			'answer' => $request->answer,
			'result' => $result
			]
			);

		if ($save) {
			return 'oke';
		}

	}

	function dataexam($id_soal, $id_set_soal, $user_id){
		$a = AnswerExam::where('question_id', $id_soal)
		->where('question_set_id', $id_set_soal)
		->where('user_id', $user_id)->first();

		if ($a != NULL) {
			return $a->answer;
		}
		
	}

	function answertrue($id){
		$a = Question::find($id);

		if ($a != NULL) {
			return response()->json($a);
		}
		
	}

	function resultexam(Request $request){
		$result = AnswerExam::where('question_set_id', $request->question_set_id)
		->where('user_id', $request->user_id)
		->where('result', 1)->count();
		AnswerExam::where('question_set_id', $request->question_set_id)
		->where('user_id', $request->user_id)->delete();

		$cek = Play::where('question_set_id', $request->question_set_id)
		->where('user_id', Auth::user()->id)->count();

		if ($cek == 0) {
			Play::create([
				'question_set_id' => $request->question_set_id,
				'user_id' => Auth::user()->id
				]);
		}

		return $result;
	}

	function upload(Request $request){
		dd($request->uploadedFile->originalName());
	}

}









