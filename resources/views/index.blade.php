<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>BloCan_Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <p class='create'>[<a href='/blogs/create'>新規作成</a>]</p>
        //ここの'posts'は記事一覧の意。深い意味なし。
        <div class='posts'>
             //$blogsはBlogControllerのwithで定義したもの。使えるようにした鞄
             //asの後ろは単数形が好ましい。asは鞄の中に入った複数の物の中から一つだけ取り出すときに用いる。
            @foreach ($blogs as $blog)
               <div class='post'>
                   //web.phpのURLと対応
                  <a href='/blogs/{{$blog->id}}'><h2 class='title'>{{$blog->title}}</h2></a>
                  <p class='body'>{{ $blog->content}}</p>
               </div>
            @endforeach
        </div>
        <div class='paginate'>
             {{ $blogs->links() }}
        </div>
    </body>
</html>
