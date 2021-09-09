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
        <p class='create'>[<a href='/blogs/create'>create</a>]</p>
        <div class='post'>
                  <h2 class='title'>{{$blog->title}}</h2>
                  <p class='body'>{{ $blog->content}}</p>
                   <p class='updated_at'>{{ $blog->updated_at}}</p>
         </div>
         <div class='back'>[<a href='/'>back</a>]</div>
    </body>
</html>