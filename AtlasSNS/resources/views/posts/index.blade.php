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
    @foreach ($posts as $post)

    <tr>
    <td>{{ $post->user->username }}</td>
    <td>{{ $post->post }}</td>
    <td>{{ $post->created_at }}</td>
    {!! Form::open(['url' => '/edit'],['id'=>$post->post]) !!}
    <td><input type="image" src="/images/edit.png" alt="編集ボタン" width="40px" class="edit-btn" ></td>
    {!! Form::open(['url' => '/destroy'],['id'=>$post->post]) !!}
    <td><input type="image" src="/images/trash.png" alt="削除ボタン" width="40px" class="trash-btn" onmouseover="this.src='/images/trash-h.png'" onmouseout="this.src='/images/trash.png'" whdth='40px'></td>
    </tr>
    <br><hr>
    @endforeach
</div>
@endsection
