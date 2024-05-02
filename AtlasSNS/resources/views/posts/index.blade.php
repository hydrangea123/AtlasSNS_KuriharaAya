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
</div>
    <!-- 投稿表示エリア -->
    @foreach ($posts as $post)

    <tr>
    <td>{{ $post->user->username }}</td>
    <td>{{ $post->post }}</td>
    <td>{{ $post->created_at }}</td>

    <form class="delete" action="{{ route('destroy', $post->id) }}" method="post">
        @csrf
    <td><input type="image" src="/images/trash.png" alt="削除ボタン" width="40px" name="destroy" onmouseover="this.src='/images/trash-h.png'" onmouseout="this.src='/images/trash.png'" whdth='40px' onClick="return confirm('この投稿を削除します。よろしいでしょうか？')"></td>
    <input type="hidden" name="_method" valu="delete">
     </form>
    </tr>
    <br><hr>
    @endforeach

@endsection

<!-- modalにtitleとURLのデータを渡すにはJSが必要 -->
<script>
    window.onload = function() {
        $('#Modal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);//モーダルを呼び出すときに使われたボタンを取得
            var title = button.data('title');//data-titleの値を取得
            var url = button.data('url');//data-urlの値を取得
            var modal = $(this);//モーダルを取得

            //Ajaxの処理はここに
            //modal-bodyのpタグにtextメソッド内を表示
            modal.find('.modal-body p').eq(0).text("本当に"+title+"を削除しますか?");
            //formタグのaction属性にurlのデータ渡す
            modal.find('form').attr('action',url);
        });
    }
</script>
