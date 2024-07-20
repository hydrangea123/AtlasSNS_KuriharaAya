@extends('layouts.login')

@section('content')
    <div class="form_area">
        <div class="form_area_flex">
            <div class="follow_images">
                <img src="{{ asset($users->images) }}" alt="icon" class="icon">
            </div>

            <div class="item">
                <p>ユーザー名</p>
                <p>自己紹介</p>
            </div>

            <div class="item_contents">
                <div class="post_username">{{ $users->username }}</div>
                <div class="post_bio">{{ $users->bio }}</div>
            </div>

            <div class="item_btn">
                @if (auth()->user()->isFollowing($users->id))
                    <form action="{{ route('unfollow', ['user' => $users->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn_follow">フォロー解除</button>
                    </form>
                @else
                    <form action="{{ route('follow', ['user' => $users->id]) }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn_folloing">フォローする</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="post_flex">
            <div class="follow_posts">
                <div class="post_top">
                    <div><img src="{{ asset($users->images) }}" alt="icon" class="icon"></div>
                </div>

                <div class="post_middle">
                    <div class="post_username">{{ $users->username }}</div>
                    <div class="post_area">{{ $post->post }}</div>
                </div>

                <div class="post_bottom">
                    <div class="time">{{ $post->created_at }}</div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
