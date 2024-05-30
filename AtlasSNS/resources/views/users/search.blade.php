@extends('layouts.login')

@section('content')
<div class="search-area">
  <form action="/search" method="post">
    @csrf
      <input type="text" name="keyword" id="search" placeholder="ユーザー名">
      <input type="image" src="/images/search.png" alt="検索ボタン" width="50px">
  </form>
  @if($keyword != "")
    <p>検索ワード：{{ $keyword }}</p>
  @endif
</div>

 <!-- 検索結果表示エリア -->
  @foreach ($users as $user)
    @if ($user->id !== Auth::user()->id)
    <div class="userSearchList">
      <!-- イメージ画像 -->
      <p>{{ $user->username }}</p>
    </div>
  
    <div>
      @if(auth()->user()->isFollowing($user->id))
        <form action="{{ route('unfollow',['user' => $user->id]) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}

          <button type="submit" class="btn btn_follow">フォロー解除</button>
        </form>
      @else
      <form action="{{ route('follow',['user' => $user->id] )}}" method="post">
        {{ csrf_field() }}

        <button type="submit" class="btn btn_folloing">フォローする</button>
      </form>
      @endif
    </div>
    @endif
  @endforeach

@endsection
