@extends('layouts.login')

@section('content')
            <div class="follow_images">
                <img src="{{ asset('storage/images/'. $posts->user->images) }}" alt="icon" class="icon" width="55px">
            </div>

            <div class="item">
                <p>ユーザー名</p>
                <p>自己紹介</p>
            </div>

            <div class="item_contents">
                <div  class="post_username">{{ $posts->username }}</div>
                <div  class="post_bio">{{ $posts->bio }}</div>
            </div>

    {{-- <div> --}}
        {{-- @if(auth()->user()->isFollowing($user->id)) --}}
        {{-- <form action="{{ route('unfollow',['user' => $user->id]) }}" method="post"> --}}
            {{-- {{ csrf_field() }} --}}
            {{-- {{ method_field('delete') }} --}}
{{--  --}}
            {{-- <button type="submit" class="btn btn_follow">フォロー解除</button> --}}
        {{-- </form> --}}
        {{-- @else --}}
        {{-- <form action="{{ route('follow',['user' => $user->id] )}}" method="post"> --}}
        {{-- {{ csrf_field() }} --}}
{{--  --}}
        {{-- <button type="submit" class="btn btn_folloing">フォローする</button> --}}
        {{-- </form> --}}
    {{-- </div> --}}
{{--  --}}
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
