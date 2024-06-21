@extends('layouts.login')

@section('content')
<div class="follower_container">
    <div class="follower_list">
        <p>フォロワーリスト</p>
        <p>フォローされている人のアイコンを表示する</p>
    </div>

    <div class="follower_post">
        @forelse($posts as $post)
        <div class="follower_posts">
            <div class="post_top">
                <div><img src="{{ asset('storage/images/'. Auth::user()->images) }}" alt="icon" class="icon" width="55px"></div>
            </div>

            <div class="post_middle">
                <div  class="post_username">{{ $post->following->username }}</div>
                <div class="post_area">{{ $post->following->post }}</div>
            </div>

            <div class="post_btn">
                <div class="time">{{ $post->following->created_at }}</div>
            </div>

        </div>
    </div>
</div>
@endsection
