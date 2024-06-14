@extends('layouts.login')

  @section('content')
  <div class="profile_container">
    @if(session('success'))
      <div>
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-date">
      @csrf

      <div class="form-group">
        <label for="name">ユーザー名</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ old('name', $user->username) }}">
         <div>
              @if($errors->has('name'))
                <p>{{ $errors->first('name') }}</p>
              @endif
          </div>
      </div>

      <div class="form-group">
        <label for="mail">メールアドレス</label>
        <input type="mail" name="mail" id="mail" class="form-control" value="{{ old('mail', $user->mail) }}">
          <div>
              @if($errors->has('mail'))
                <p>{{ $errors->first('mail') }}</p>
              @endif
          </div>
      </div>

      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" name="password" class="form-control">
          <div>
              @if($errors->has('password'))
                <p>{{ $errors->first('password') }}</p>
              @endif
          </div>
      </div>

      <div class="form-group">
        <label for="password_confirmation">パスワード確認</label>
        <input type="password" name="password_confirmation" class="form-control">
          <div>
              @if($errors->has('password_confirmation'))
                <p>{{ $errors->first('password_confirmation') }}</p>
              @endif
          </div>  
      </div>

      <div class="form-group">
        <label for="bio">自己紹介</label>
        <textarea name="bio" id="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
          <div>
              @if($errors->has('bio'))
                <p>{{ $errors->first('bio') }}</p>
              @endif
          </div>  
      </div>
    
      <div class="form-group">
        <label for="profile_picture">アイコン画像</label>  
        <input
            type="file"
            id="fileElem"
            accept="image/*"
            style="display:none" 
            name="images"/>
            
        <button id="fileSelect" type="button">ファイルを選択</button>

        <div>
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
