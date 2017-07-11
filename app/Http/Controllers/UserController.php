<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\QuestionSet;
use App\User;
use App\Following;
use App\Notification;

class UserController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	function logout(){
		Auth::logout();
		return redirect('/');
	}

	function view(){
		$id = Auth::user()->id;
		$countpost = QuestionSet::where('post', '1')->where('user_id', $id)->count();
		$countarchive = QuestionSet::where('post', '0')->where('user_id', $id)->count();
		$archivequestionsets = QuestionSet::where('post', '0')->where('user_id', $id)->get();
		$questionsets = QuestionSet::where('post', '1')->where('user_id', $id)->get();

		return view('user.profile', compact('countpost', 'archivequestionsets', 'questionsets', 'countarchive'));
	}

	function view_user($username){
		$id = User::where('username' , $username)->first()->id;
		$countpost = QuestionSet::where('post', '1')->where('user_id', $id)->count();
		$countarchive = QuestionSet::where('post', '0')->where('user_id', $id)->count();
		$postedquestion = QuestionSet::where('post', '1')->where('user_id', $id)->get();
		$user = User::where('username' , $username)->first();
		$following = Following::where('user_id', Auth::user()->id)->where('following_id', $id)->count();
		return view('user.profile_other', compact('user', 'countpost', 'archivequestionsets', 'questionsets', 'postedquestion', 'following'));
	}

	function setting(){
		return view('user.setting');
	}

	function following(Request $request){
		$cek = Following::where('following_id', $request->following_id)
		->where('user_id', $request->user_id)->count();

		if ($cek == 1) {
			Following::where('following_id', $request->following_id)
			->where('user_id', $request->user_id)->delete();
			Notification::where('user_id', $request->user_id)->where('notif_by', Auth::user()->id)->where('type', 'follow')->delete();
		}else{
			Following::create([
				'following_id' => $request->following_id,
				'user_id' => Auth::user()->id
				]);
			Notification::create([
				'user_id' => $request->following_id,
				'notif_by' => Auth::user()->id,
				'type' => 'follow'
				]);
		}
	}

	function readnotif($id){
		Notification::find($id)->update([
			'read' => '0'
			]);
		return $id;
	}


}
