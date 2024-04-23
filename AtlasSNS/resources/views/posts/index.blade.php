@extends('layouts.login')

@section('content')
<div class="form-area">

    <img src="/images/icon1.png" width="55px" class="post-icon">
    {!! Form::open(['url' => '/posts']) !!}

    {{ Form::textarea('post',null,['class' => 'post-area','placeholder' => '投稿内容を入力してください。']) }}

    <input type="image" src="/images/post.png" alt="送信ボタン" width="40px" class="post-btn">

</div>

<div class="posted-area">
    <img src="/images/icon1.png" width="55px" class="post-icon">
    <p>{{ Auth::user()->username }}</p>

    <!-- エラーメッセージエリア -->
    @if($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <!-- 投稿表示エリア -->
    @isset($posts)
    @foreach ($posts as $post)
    <h2>{{ $post->user->username }}</h2>
    <br><hr>
    @endforeach
    @endisset

</div>

@endsection
