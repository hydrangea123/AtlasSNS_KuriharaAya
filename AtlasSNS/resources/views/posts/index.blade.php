@extends('layouts.login')

@section('content')
<div class="form-area">
    <div class="form-flex">
        <img src="/images/icon1.png" width="55px" class="post-icon">
        {!! Form::open(['url' => '/posts']) !!}

        {{ Form::textarea('post',null,['class' => 'post-area','placeholder' => '投稿内容を入力してください。']) }}

    <input type="image" src="/images/post.png" alt="送信ボタン" width="40px" class="post-btn">
</div>
</div>

<div class="posted-area">
    <p>{{ Auth::user()->images }}</p>
    <p>{{ Auth::user()->username }}</p>
</div>
    <!-- 投稿表示エリア -->
    <table>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->user->username }}</td>
        <td>{{ $post->post }}</td>
        <td>{{ $post->created_at }}</td>
    
        <td class="edit_btn">
            <!-- 投稿の編集ボタン -->
            <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
                <input type="image" src="/images/edit.png" alt="編集ボタン" width="40px">
            </a>
        </td>
    
        <td>
            <!--投稿の削除ボタン  -->
            <form class="delete" action="{{ route('destroy', $post->id) }}" method="post">
                <input type="image" src="/images/trash.png" alt="削除ボタン" width="40px" name="destroy" onmouseover="this.src='/images/trash-h.png'" onmouseout="this.src='/images/trash.png'" width="40px" onClick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                @csrf
            </form>
        </td>
    </tr>
    @endforeach
    </table>

    <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="{{ route('edit') }}" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="modal_id" class="modal_id" value="">
                <input type="image" src="/images/edit.png" alt="編集ボタン" width="40px" class="modal-submit">

                {{ csrf_field() }}
            </form>
        </div>
    </div>



@endsection
