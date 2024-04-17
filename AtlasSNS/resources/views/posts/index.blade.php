@extends('layouts.login')

@section('content')
<div class="form-area">

    <img src="/images/icon1.png" width="55px" class="post-icon">

    {{ Form::textarea('post',null,['class' => 'post-area','placeholder' => '投稿内容を追加してください。']) }}

    <input type="image" src="/images/post.png" alt="送信ボタン" width="40px" class="post-btn">

</div>
@endsection
