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
  @endif
  @endforeach

@endsection
