<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\QuestionSet;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function index(){

		return view('question.setsoal');
	}

	function create($id){
		$status = Auth::user()->status;
		if ($status == 'guru') {
			$questionsets = QuestionSet::where('id', $id)->get();
			return view('question.create', compact('questionsets'));
		}else{
			return redirect ('');
		}
	}

}
