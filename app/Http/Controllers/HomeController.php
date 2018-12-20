<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //does not work
        // $posts = auth()->user()->posts()->orderBy('created_at', 'DESC')->get();

        $posts = auth()->user()->posts->sortByDesc('updated_at');
        // return view('home')->with('posts',$user->posts);
        return view('home')->with('posts',$posts);
    }
}
