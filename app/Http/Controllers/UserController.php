<?php

namespace App\Http\Controllers;

use Validator;
use Storage;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
		// $postedquestion = QuestionSet::where('post', '1')->where('user_id', $id)->get();

		return view('user.profile', compact('countpost', 'archivequestionsets', 'countarchive'));
	}

	function view_user(Request $request){
		$user = User::where('username' , $request->username)->first();
		if ($user != null) {
			$id = User::where('username' , $request->username)->first()->id;
			$countpost = QuestionSet::where('post', '1')->where('user_id', $id)->count();
			$countarchive = QuestionSet::where('post', '0')->where('user_id', $id)->count();
			$postedquestion = QuestionSet::where('post', '1')->where('user_id', $id)->paginate(9);
			$following = Following::where('user_id', Auth::user()->id)->where('following_id', $id)->count();
			if ($request->page) {
				return [
					'post' => view('partials.questionset2')->with(compact('postedquestion'))->render(),
					'requestpage' => $postedquestion->nextPageUrl(),
				];
			}
			return view('user.profile_other', compact('user', 'countpost', 'archivequestionsets', 'questionsets', 'postedquestion', 'following'));
		}else{
			return redirect('');
		}
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
			Notification::where('user_id', $request->following_id)->where('notif_by', Auth::user()->id)->where('type', 'follow')->delete();
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

	function update(Request $request){

		$validate = $this->validate($request, [
			'username' => 'required|max:20|unique:users,username,'.Auth::user()->id,
			'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
			'avatar' => 'image|max:1000000'
		]);

		$current_username = Auth::user()->username;
		$current_email = Auth::user()->email;

		if ($request->avatar != '') {
			if ($request->avatar->isValid()) {
				$name = date('ymd-h-i-s.');
				$extension = $request->avatar->extension();
				$avatar = 'clues-'.$name.$extension;
				$store = $request->avatar->storeAs('public/avatar', $avatar);
				if ($store) {
					if (Auth::user()->avatar != '') {
						Storage::delete('public/avatar/'.Auth::user()->avatar);
					}
					User::find(Auth::user()->id)->update([
						'avatar' => $avatar,
						'name' => $request->name,
						'username' => $request->username,
						'email' => $request->email,
						'biography' => $request->biography,
					]);
				}
			}
		}else{
			User::find(Auth::user()->id)->update([
				'name' => $request->name,
				'username' => $request->username,
				'email' => $request->email,
				'biography' => $request->biography,
			]);
		}
		if ($request->registerprofile != '') {
			Session::flash('pesan', 'Terima kasih telah mendaftar!');
			return redirect('');
		}else{
			return redirect('settings');
		}


	}

	function registerprofile(){
		return view('user.registerprofile');
	}

	function changepassword(Request $request){
		$this->validate($request, [
			'password' => 'required|min:6|confirmed'
		]);
		User::find(Auth::user()->id)->update([
			'password' => Hash::make($request->password),
		]);
		return redirect('settings');
	}

	function readnotif($id){
		Notification::find($id)->update([
			'read' => '0'
		]);
		return $id;
	}


	function followers(){
		$follow = Following::where('user_id', Auth::user()->id)->get();
		$followers = Following::where('following_id', Auth::user()->id)->get();
		return view('user.followers', compact('followers'));
	}

	function followings(){
		$followings = Following::where('user_id', Auth::user()->id)->get();
		return view('user.followings', compact('followings'));
	}

	function followers_other($user_id){
		$followers = Following::where('following_id', $user_id)->get();
		return view('user.followers', compact('followers'));
	}

	function followings_other($user_id){
		$followings = Following::where('user_id', $user_id)->get();
		return view('user.followings', compact('followings'));
	}


}
