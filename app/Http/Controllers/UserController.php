<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\QuestionSet;
use App\User;

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
		$username = Auth::user()->username;
		$id = User::where('username' , $username)->first()->id;
		$countpost = QuestionSet::where('post', '1')->where('user_id', $id)->count();
		$countarchive = QuestionSet::where('post', '0')->where('user_id', $id)->count();
		$archivequestionsets = QuestionSet::where('post', '0')->where('user_id', $id)->get();
		$questionsets = QuestionSet::where('post', '1')->where('user_id', $id)->get();

		return view('user.profile', compact('countpost', 'archivequestionsets', 'questionsets', 'countarchive'));
	}

	function view_user($username){
		$id = User::where('username' , $username)->first()->id;
		$countpost = QuestionSet::where('post', '1')->where('user_id', $id)->count();
		return view('user.profile', compact('countpost'));
	}

	function setting(){
		return view('user.setting');
	}
}
