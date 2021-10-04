<?php

namespace App\Http\Controllers;
//App\Blog.phpのクラス名;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
class BlogController extends Controller
{
    //index(モデル名　$テーブル名)
    public function index(Blog $blog)
    {
    // view(index.blade.php)に遷移する。with(鞄みたいなもの)を用いてテーブルの情報を
        return view('index')->with(['blogs' =>$blog->getByLimit()]);
    }
    public function search(Request $request)
    {
        $blogs = Blog::where('title','like',"%{$request->search}%")
                ->orWhere('content','like',"%{$request->search}%")
    //wherehasとqueryを使ってリレーション先のデータを検索できる。そのリレーション先を使うかを1つ目の''の中に書く。
    //useでその中で使う変数を定義する。変数はorwherehas内で用いるもの。
                ->orWhereHas('user', function($query) use ($request) {
                    $query->where('name','like',"%{$request->search}%");
                })->paginate(5);
        
        $search_result = $request->search.'の検索結果'.count($blogs).'件';
                
        return view('index', ['blogs' => $blogs],['search_result' => $search_result]);
    }
    public function show(Blog $blog)
    {
    //上は一覧で複数データが入っているからblogs。これは詳細だからblogでOK。
        return view('show')->with(['blog' =>$blog]);
        $posts = Post::with('user')->get();
        //dd($posts);
        return view('home');
        $posts = Post::all();

        return view('index', ['blogs' => $blog]);
    }
    public function create()
    {
        return view('create');
    }
    //ユーザーの入力情報を用いる際はリクエストインスタンスを用いてアクセスするように。
    public function store(Blog $blog, Request $request)
    {
        $user = Auth::user();
        //配列自体を変数に格納したい
        $input = $request['blog'];
        //$input['title']= $request->title; (nameがtitleだけだった場合このようにして一個ずつ)
        //ホームで入力した情報が入った$inputに'user_id'という情報を足す。
        $input['user_id'] = $user->id; 
        //s3アップロード開始
        //fileなど決まったメソッドでしか取り出せないものはこのように記載
        $image = $request->file('image');
         // バケットの`Blogs_folder`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('Blogs_folder', $image, 'public');
         // アップロードした画像のフルパスを取得
        $input['image_path']= Storage::disk('s3')->url($path);
        $blog->fill($input)->save();
        return redirect('/blogs/'. $blog->id);
    }
    public function edit(Blog $blog )
    {
        return view('edit')->with(['blog'=> $blog]);
    }
     public function update(Request $request, Blog $blog )
    {
        $input = $request['blog'];
        $blog->fill($input)->save();
        return redirect('/blogs/' . $blog->id);
    }
    public function delete(Blog $blog)
    {
        $blog->delete();
        return redirect('/');
    }
}
