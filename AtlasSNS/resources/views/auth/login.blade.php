@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

<div class="inner">
  <p>AtlasSNSへようこそ</p>

    <div class="box">
      <div class="form">
        {{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
      </div>

      <div class="form">
        {{ Form::label('パスワード') }}
        {{ Form::password('password',['class' => 'input']) }}
      </div>
    </div>
        {{ Form::submit('ログイン', ['class' => 'button btn_right']) }}

  <p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close() !!}

@endsection
