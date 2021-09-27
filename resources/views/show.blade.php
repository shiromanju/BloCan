<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>BloCan_Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="/">TOPページへ</a>
             <a href="/home">マイページ</a>
        </header>
        <h1>BloCan</h1>
        <p class='edit'>[<a href="/blogs/{{ $blog->id }}/edit">編集</a>]</p>
        <form action="/blogs/{{ $blog->id}}" id="form_delete" method="post">
            {{ csrf_field()}}
            {{ method_field('delete') }}
            <button type="submit"  onclick="return deletePost(this)";>削除</button>
        </form>
        <div class='post'>
                <h2 class='title'>{{ $blog->title }}</h2>
                  @if ($blog->image_path)
                <!-- 画像を表示 -->
                <img src="{{ $blog->image_path }}">
                  @endif
                <p class='content'>{!! nl2br(e($blog->content)) !!}</p>
                <p class='user_name'>{{ $blog->user->name }}</p>
                <p class='updated_at'>{{ $blog->updated_at }}</p>
                <p class='category'>{{ $blog->category }}</p>
         </div>
         <div class='back'>[<a href='/'>戻る</a>]</div>
         <script>
         function deletePost(e){
             'use strict';
             if(confirm('削除されると復元できません。\n本当に削除しますか？')){
                 document.getElementById('form_delete').submit();
             }
         }
         </script>
    </body>
</html>
