@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>


<div>
{{ Form::label('ユーザー名') }}
  <div>
  @if($errors->has('ユーザー名'))
    @foreach($errors->get('ユーザー名') as $message)
      {{ $message }}<br>
    @endforeach
  @endif
  </div>
{{ Form::text('username',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('メールアドレス') }}
  <div>
    @if($errors->has('メールアドレス'))
      @foreach($errors->get('メールアドレス') as $message)
        {{ $message }}<br>
      @endforeach
    @endif
  </div>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('パスワード') }}
  <div>
    @if($errors->has('パスワード'))
        @foreach($errors->get('パスワード') as $message)
          {{ $message }}<br>
        @endforeach
      @endif
  </div>
{{ Form::text('password',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('パスワード確認') }}
  <div>
    @if($errors->has('パスワード確認'))
        @foreach($errors->get('パスワード確認') as $message)
          {{ $message }}<br>
        @endforeach
      @endif
  </div>
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
</div>

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
