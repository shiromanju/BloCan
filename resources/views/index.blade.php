<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>BloCan_Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/b45c379cd9.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <a href="/">TOPページへ</a>
            <a href="/home">マイページ</a>
            <div class="container">
                <div class="row">
                    <h7>検索</h7>
                    <div class="span12">
                        <form action="{{ route('blogs.search') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="input-append span12">
                                <input type="text" class="search-form" placeholder="Search" name="search">
                                <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    @isset($search_result)
                    <h5 class="search_result">{{ $search_result }}</h5>
                    @endisset
                </div>
            </div>
        </header>
        <h1>BloCan</h1>
        <p class='create'>[<a href='/blogs/create'>新規作成</a>]</p>
        <div class='posts'>
            @foreach ($blogs as $blog)
               <div class='post'>
                  <a href='/blogs/{{$blog->id}}'><h2 class='title'>{{$blog->title}}</h2></a>
                  <p class='body'>{{ $blog->content}}</p>
                  <p class="card-text">投稿者：{{ $blog->user->name }}</p>
                    <div class="row justify-content-center">
                        @if($blog->users()->where('user_id', Auth::id())->exists())
                        <div class="col-md-3">
                            <form action="{{ route('unfavorites', $blog) }}" method="POST">
                                @csrf
                                <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                            </form>
                        </div>
                        @else
                        <div class="col-md-3">
                            <form action="{{ route('favorites', $blog) }}" method="POST">
                                @csrf
                                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                            </form>
                        </div>
                        @endif
                        <div class="row justify-content-center">
                            <p>いいね数：{{ $blog->users()->count() }}</p>
                        </div>
                    </div>
               </div>
            @endforeach
        </div>
        <div class='paginate'>
             {{ $blogs->links() }}
        </div>
    </body>
</html>
