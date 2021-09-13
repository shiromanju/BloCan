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
        <form action="/blogs/{{ $blog->id }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="title">
                <h2>ブログタイトル</h2>
                <input type="text" name="blog[title]" placeholder="タイトル" value="{{ $blog->title }}"/>
            </div>
            <div class="category">
                <h2>カテゴリ</h2>
                <select name="blog[category]">
                    <option value="イベント">イベント</option>
                    <option value="キャリア">キャリア</option>
                    <option value="ゲーム">ゲーム</option>
                    <option value="コンピューター・テクノロジー">コンピューター・テクノロジー</option>
                    <option value="スポーツ">スポーツ</option>
                    <option value="ビジネス">ビジネス</option>
                    <option value="ペット">ペット</option>
                    <option value="ホーム・ガーデン">ホーム・ガーデン</option>
                    <option value="ライフステージ">ライフステージ</option>
                    <option value="映画・テレビ">映画・テレビ</option>
                    <option value="音楽・ラジオ">音楽・ラジオ</option>
                    <option value="家族">家族</option>
                    <option value="科学情報">科学情報</option>
                    <option value="教育">教育</option>
                    <option value="金融">金融</option>
                    <option value="健康">健康</option>
                    <option value="自動車・バイク">自動車・バイク</option>
                    <option value="社会">社会</option>
                    <option value="趣味・興味">趣味・興味</option>
                    <option value="書籍・文学">書籍・文学</option>
                    <option value="グルメ">グルメ</option>
                    <option value="美容">美容</option>
                    <option value="法律・政治・行政">法律・政治・行政</option>
                    <option value="旅行">旅行</option>
                </select>
            </div>
            <div class="content">
                <h2>ブログ本文</h2>
                <textarea name="blog[content]" cols="80" rows=60 placeholder="どんなことを知ってもらいたい？"/>{{ $blog->content }}</textarea>
            </div>
            <input type="submit" value="更新"/>
        </form>
        <div class='back'>[<a href='/posts/{{ $blog->id }}'>back</a>]</div>
    </body>
</html>
