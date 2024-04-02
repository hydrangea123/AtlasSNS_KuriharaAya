@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

<div>
{{ Form::label('ユーザー名') }}
  <div>
  @if($errors->has('username'))
    @foreach($errors->get('username') as $message)
      {{ $message }}<br>
    @endforeach
  @endif
  </div>
{{ Form::text('username',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('メールアドレス') }}
  <div>
    @if($errors->has('mail'))
      @foreach($errors->get('mail') as $message)
        {{ $message }}<br>
      @endforeach
    @endif
  </div>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('パスワード') }}
  <div>
    @if($errors->has('password'))
        @foreach($errors->get('password') as $message)
          {{ $message }}<br>
        @endforeach
      @endif
  </div>
{{ Form::password('password',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('パスワード確認') }}
  <div>
    @if($errors->has('password_confirmation'))
        @foreach($errors->get('password_confirmation') as $message)
          {{ $message }}<br>
        @endforeach
      @endif
  </div>
{{ Form::passwor('password_confirmation',null,['class' => 'input']) }}
</div>

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
