<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Following;
use App\QuestionSet;
use App\User;

class HomeController extends Controller
{
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $follow = Following::where('user_id', Auth::user()->id)->get();
            $postedquestion = QuestionSet::where('post', '1')->paginate(9);

            // if ($follow->count() > 1) {
            //     $a = array();
            //     foreach ($follow as $key => $value) {
            //         array_push($a, $value->following_id);
            //     }
            //     $postedquestion = QuestionSet::whereIn('user_id', $a)->where('post', '1')
            //     ->paginate(9);
            // }elseif($follow->count() == 1){
            //     foreach ($follow as $key => $value) {
            //         $a = $value->following_id;
            //     }
            //     $postedquestion = QuestionSet::where('post', '1')->where('user_id', $a)
            //     ->paginate(9);
            // }else{
            //     $postedquestion = QuestionSet::where('post', '1')->where('user_id', '')
            //     ->paginate(9);
            // }
            if ($request->page) {
                return [
                'post' => view('partials.questionset_beranda2')->with(compact('postedquestion'))->render(),
                'requestpage' => $postedquestion->nextPageUrl(),
                ];
            }
            // $users = User::inRandomOrder()->paginate(10);
            return view('beranda', compact('postedquestion'));
        }
        return view('home');
        
    }

    function tentang(){
        return view('home.about');
    }

    function syaratketentuan(){
        return view('home.privacypolicy');
    }

    function bantuan(){
        return view('home.help');
    }

    function kontak(){
        return view('home.contact');
    }


}
