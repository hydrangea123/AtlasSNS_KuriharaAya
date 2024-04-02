@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

<div>
{{ Form::label('username') }}
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
{{ Form::label('mail') }}
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
{{ Form::label('password') }}
  <div>
    @if($errors->has('password'))
        @foreach($errors->get('password') as $message)
          {{ $message }}<br>
        @endforeach
      @endif
  </div>
{{ Form::text('password',null,['class' => 'input']) }}
</div>

<div>
{{ Form::label('password_confirmation') }}
  <div>
    @if($errors->has('password_confirmation'))
        @foreach($errors->get('password_confirmation') as $message)
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
