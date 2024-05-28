@extends('layouts.logout')

@section('content')

<form>
  <div class="add_top">
     @if(session('username'))
     <p>{{ session('username')}}さん</p>
     @endif
    <p>ようこそ！AtlasSNSへ！</p>
  </div>

  <div class="add_bottom">
    <p>ユーザー登録が完了いたしました。</p>
    <p>早速ログインをしてみましょう。</p>
  </div>
  
  <p class="button add_btn "><a href="/login">ログイン画面へ</a></p>

</form>

@endsection
