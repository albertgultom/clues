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
		if ($request->keyword) {
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
			->paginate(9);
			
			$users = User::where('username', 'LIKE', "%$keyword%")
			->get();
			if ($users->count() > 1) {
				$a = array();
				foreach ($users as $key => $value) {
					array_push($a, $value->id);
				}
				$postedquestion = QuestionSet::whereIn('user_id', $a)->where('post', '1')
				->paginate(9);
				
				// $follow = Following::where('user_id', Auth::user()->id)->get();
			}elseif($users->count() == 1){
				foreach ($users as $key => $value) {
					$a = $value->id;
				}
				$postedquestion = QuestionSet::where('post', '1')->where('user_id', $a)
				->paginate(9);
				
				// $follow = Following::where('user_id', Auth::user()->id)->get();
			}
		}else{
			$keyword = $request->keyword;
			$postedquestion = QuestionSet::where('post', '1')->orderBy('created_at', 'asc')->paginate(9);
			$users = User::where('username', $keyword);
			// $follow = Following::where('user_id', $keyword);
		}
		
		if ($request->ajax()) {
			return [
			'post' => view('partials.questionset2')->with(compact('postedquestion'))->render(),
			'requestpage' => $postedquestion->nextPageUrl(),
			];
		}
		
		return view('search.result', compact('keyword', 'postedquestion', 'users'));
	}
}
