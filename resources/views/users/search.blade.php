@extends('layouts.login')

@section('content')
    <div class="search_area">
        <form action="/search" method="post">
            @csrf
            <input type="text" name="keyword" id="search" placeholder="ユーザー名" class="search_box">
            <input type="image" src="/images/search.png" alt="検索ボタン" width="50px" class="search_icon">
        </form>
        @if ($keyword != '')
            <p class="search_word">検索ワード：{{ $keyword }}</p>
        @endif
    </div>

    <!-- 検索結果表示エリア -->
    @foreach ($users as $user)
        @if ($user->id !== Auth::user()->id)
            <div class="user_search_list">
                <div><img src="{{ asset($user->images) }}" alt="icon" class="icon"></div>
                <p>{{ $user->username }}</p>

                @if (auth()->user()->isFollowing($user->id))
                    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="post" class="search_follow_form">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}

                        <button type="submit" class="btn btn_follow">フォロー解除</button>
                    </form>
                @else
                    <form action="{{ route('follow', ['user' => $user->id]) }}" method="post" class="search_follow_form">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn_folloing">フォローする</button>
                    </form>
                @endif
            </div>
        @endif
    @endforeach
@endsection
