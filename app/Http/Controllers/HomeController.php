<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Following;
use QuestionSet;

class HomeController extends Controller
{
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('beranda');
        }
        
        return view('home');
        
    }
}
