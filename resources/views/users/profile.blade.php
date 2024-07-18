@extends('layouts.login')

  @section('content')
  <div class="profile_container">
    @if(session('success'))
      <div>
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form_data">
      @csrf

      <div style="position: relative;right: 70px;top: 15px; width: 55px"><img src="{{ asset('storage/images/'. Auth::user()->images) }}" alt="icon" class="icon" width="55px"></div>

      <div class="form-box">
            <div class="form_group">
              <label for="name">ユーザー名</label>
              <input type="text" name="username" id="username" class="form_control" value="{{ old('name', $user->username) }}">
            </div>

             <div class="validation">
                  @if($errors->has('name'))
                  <p>{{ $errors->first('name') }}</p>
                  @endif
            </div>
      </div>

      <div class="form_box">
            <div class="form_group">
                <label for="mail">メールアドレス</label>
                <input type="mail" name="mail" id="mail" class="form_control" value="{{ old('mail', $user->mail) }}">
            </div>

            <div class="validation">
                  @if($errors->has('mail'))
                    <p>{{ $errors->first('mail') }}</p>
                  @endif
            </div>
        </div>

      <div class="form_box">
            <div class="form_group">
                <label for="password">パスワード</label>
                <input type="password" name="password" class="form_control">
            </div>

            <div class="validation">
                @if($errors->has('password'))
                  <p>{{ $errors->first('password') }}</p>
                @endif
            </div>
        </div>

        <div class="form_box">
            <div class="form_group">
                <label for="password_confirmation">パスワード確認</label>
                <input type="password" name="password_confirmation" class="form_control">
            </div>

            <div class="validation">
                @if($errors->has('password_confirmation'))
                  <p>{{ $errors->first('password_confirmation') }}</p>
                @endif
            </div>
        </div>

        <div class="form_box">
            <div class="form_group">
                <label for="bio">自己紹介</label>
                <textarea name="bio" id="bio" class="form_control">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div class="validation">
                @if($errors->has('bio'))
                  <p>{{ $errors->first('bio') }}</p>
                @endif
            </div>
        </div>

        <div class="form_box">
            <div class="form_group">
                <label for="profile_picture">アイコン画像</label>
                <input
                    type="file"
                    id="fileElem"
                    accept="image/*"
                    style="display:none"
                    name="images">

                <button id="fileSelect" type="button"><span class="file_text">ファイルを選択</span></button>
            </div>

            <div class="validation">
                @if($errors->has('images'))
                  <p>{{ $errors->first('images') }}</p>
                @endif
            </div>
        </div>

      <button type="submit" class="button">更新</button>
    </form>
  </div>
  @endsection

</html>
