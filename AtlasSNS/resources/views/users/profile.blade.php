@extends('layouts.login')




  @section('content')
  <div class="container">
    @if(session('success'))
      <div>
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-date">
      @csrf

      <div class="form-group">
        <label for="name">ユーザー名</label>
        <input type="text" name="name" id="naem" class="form-control" value="{{ old('name', $user->username) }}">
      </div>

      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->mail) }}">
      </div>

      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" name="password" class="form-control">
      </div>

      <div class="form-group">
        <label for="password_confirmation">パスワード確認</label>
        <input type="password" name="password_confirmation" class="form-control">
      </div>

      <div class="form-group">
        <label for="bio">自己紹介</label>
        <textarea name="bio" id="bio" class="form-control" value="{{ old('bio', $user->bio) }}"></textarea>
      </div>
    
      <div class="form-group">
        <label for="profile_picture">アイコン画像</label>
        <input type="file" name="iconimage" id="iconimage" class="form-control" value="ファイルを選択">
      </div>

      <button type="submit" class="button">更新</button>
    </form>
  </div>
  @endsection

</html>
