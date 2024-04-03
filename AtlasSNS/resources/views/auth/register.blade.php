@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

<div>
{{ Form::label('ユーザー名') }}
  <div>
  @if($errors->has('username'))
      <p>{{ $errors->first('username') }}</p>
  @endif
  </div>
{{ Form::text('username',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('メールアドレス') }}
  <div>
    @if($errors->has('mail'))
      <p>{{ $errors->first('mail') }}</p>
    @endif
  </div>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('パスワード') }}
  <div>
    @if($errors->has('password'))
      <p>{{ $errors->first('password') }}</p>
    @endif
  </div>
{{ Form::password('password',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('パスワード確認') }}
  <div>
    @if($errors->has('password_confirmation'))
      <p>{{ $errors->first('password_confirmation') }}</p>
    @endif
  </div>
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
</div>

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
