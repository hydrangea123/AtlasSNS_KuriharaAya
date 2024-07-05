@extends('layouts.login')

@section('content')
<div class="follower_container">
    <div class="form-area list_flex">
        <p style="font-size: 20px;">フォローリスト</p>
        <div class="icon_list">
            @foreach ( $posts as $post )
                <div class="follow_images">
                    <a href="{{ route('each_profile', ['id' => $post->user->id]) }}"><img src="{{ asset('storage/images/'. $post->user->images) }}" alt="icon" class="icon" width="55px"></a>
                </div>
            @endforeach
        </div>
    </div>


    @foreach($posts as $post)
        <div class="post_flex">
          <div class="follow_posts">
            <div class="post_top">
                <div><img src="{{ asset('storage/images/'. $post->user->images) }}" alt="icon" class="icon" width="55px"></div>
            </div>

            <div class="post_middle">
                <div  class="post_username">{{ $post->user->username }}</div>
                <div class="post_area">{{ $post->post }}</div>
            </div>

            <div class="post_btn">
                <div class="time">{{ $post->created_at }}</div>
            </div>
          </div>
        </div>
    @endforeach
</div>
@endsection
