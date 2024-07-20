@extends('layouts.login')

@section('content')
    <div class="follower_container">
        <div class="form_area list_flex">
            <p>フォロワーリスト</p>
            <div class="icon_list">
                @foreach ($posts as $post)
                    <div class="follow_images">
                        <a href="{{ route('each_profile', ['id' => $post->user->id]) }}"><img
                                src="{{ asset($post->user->images) }}" alt="icon" class="icon"></a>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($posts as $post)
            <div class="post_flex">
                <div class="follow_posts">
                    <div class="post_top">
                        <div><img src="{{ asset($post->user->images) }}" alt="icon" class="icon">
                        </div>
                    </div>

                    <div class="post_middle">
                        <div class="post_username">{{ $post->user->username }}</div>
                        <div class="post_area">{{ $post->post }}</div>
                    </div>

                    <div class="post_bottom">
                        <div class="time">{{ $post->created_at }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
