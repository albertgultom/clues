<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\QuestionSet;
use App\User;
use App\Following;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

	function getResult(Request $request){
		$keyword = '';
		if ($request->keyword != null || $request->keyword != '') {
			$keyword = $request->keyword;
			$postedquestion = QuestionSet::where([
				[DB::raw("CONCAT(name, ' ', level, '', '',study_name)"), 'LIKE', "%$keyword%"],
				['post', '1']
				])
			->orWhere([
				['name', 'LIKE', "%$keyword%"],
				['post', '1']
				])
			->orWhere([
				['level', 'LIKE', "%$keyword%"],
				['post', '1']
				])
			->orWhere([
				['study_name', 'LIKE', "%$keyword%"],
				['post', '1']
				])
			->get();

			$users = User::where('username', 'LIKE', "%$keyword%")
			->get();
			if ($users->count() > 1) {
				$a = array();
				foreach ($users as $key => $value) {
					array_push($a, $value->id);
				}
				$postedquestion = QuestionSet::whereIn('user_id', $a)->where('post', '1')
				->get();
				// $follow = Following::where('user_id', Auth::user()->id)->get();
			}elseif($users->count() == 1){
				foreach ($users as $key => $value) {
					$a = $value->id;
				}
				$postedquestion = QuestionSet::where([
					['user_id', $a],
					['post', '1']
					])
				->get();
				// $follow = Following::where('user_id', Auth::user()->id)->get();
			}
		}else{
			$postedquestion = QuestionSet::where('post', '1')->orderBy('created_at', 'asc')->get();
			$users = User::where('username', $keyword);
			// $follow = Following::where('user_id', $keyword);
		}

		
		
		return view('search.result', compact('keyword', 'postedquestion', 'users'));
	}
}
