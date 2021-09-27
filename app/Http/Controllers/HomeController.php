<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Authは今ログインしている人の情報を獲得する＝一人
        $user = Auth::user();
        //$userに紐づいた(リレーションした)投稿情報(blogs)を持ってきた(getした)ものを$blogsと定義する
        $blogs=$user->blogs()->get();
        return view('home')->with(['blogs'=>$blogs]);
    }
}
