<?php

namespace App\Http\Controllers;
//App\Blog.phpのクラス名;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //index(モデル名　$テーブル名)
      public function index(Blog $blog)
    {
    // view(index.blade.php)に遷移する。with(鞄みたいなもの)を用いてテーブルの情報を
        return view('index')->with(['blogs' =>$blog->getByLimit()]);
    }
    public function show(Blog $blog)
    {
    //上は一覧で複数データが入っているからblogs。これは詳細だからblogでOK。
        return view('show')->with(['blog' =>$blog]);
    }
    public function create()
    {
        return view('create');
    }
    //ユーザーの入力情報を用いる際はリクエストインスタンスを用いてアクセスするように。
    public function store(Blog $blog, Request $request)
    {
        //配列自体を変数に格納したい
        $input = $request['blog'];
        $blog->fill($input)->save();
        return redirect('/blogs/'. $blog->id);
    }
}
