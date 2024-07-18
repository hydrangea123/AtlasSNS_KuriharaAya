@extends('layouts.login')

@section('content')
<div class="form_area">
    <div class="form_area_flex">
        <div><img src="{{ asset( Auth::user()->images) }}" alt="icon" class="icon"></div>

        {!! Form::open(['url' => '/posts']) !!}

        {{ Form::textarea('post',null,['class' => 'post_area','placeholder' => '投稿内容を入力してください。']) }}

        <input type="image" src="/images/post.png" alt="送信ボタン" width="40px" class="post_btn">
    </div>
</div>
<img src="{{ asset('storage/images/{}') }}" alt="" width="55px" height="55px">
    <!-- 投稿表示エリア -->
<div class="posted_area">

    @foreach ($posts as $post)
    <div class="post_flex">

        <div class="post_top">
            <div><img src="{{ asset($post->user->images) }}" alt="icon" class="icon"></div>
        </div>

        <div class="post_middle">
            <div  class="post_username">{{ $post->user->username }}</div>
            <div class="post_area">{{ $post->post }}</div>
        </div>

        <div class="post_btn">

            <div class="time" style="margin-bottom: 30px;">{{ $post->created_at }}</div>

        <!-- 投稿の編集ボタン -->
            <div class="form_flex">
                <div class="edit_btn">
                    <a class="js_modal_open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
                        <input type="image" src="/images/edit.png" alt="編集ボタン" width="40px">
                    </a>
                </div>

        <!-- 投稿の削除ボタン  -->
                <form class="delete" action="{{ route('destroy', $post->id) }}" method="post">
                    <input type="image" src="/images/trash.png" alt="削除ボタン" width="40px" name="destroy" onmouseover="this.src='/images/trash-h.png'" onmouseout="this.src='/images/trash.png'" width="40px" onClick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                    @csrf
                </form>
            </div>
        </div>

    </div>
    @endforeach
</div>

    <!-- モーダルの中身 -->
    <div class="modal js_modal">
        <div class="modal__bg js_modal_close"></div>
        <div class="modal__content">
            <form action="{{ route('edit') }}" method="post">
                <textarea name="upPost" class="modal_post" style="border: solid 1px"></textarea>
                <input type="hidden" name="modal_id" class="modal_id" value="">
                <input type="image" src="/images/edit.png" alt="編集ボタン" class="modal_submit">

                {{ csrf_field() }}
            </form>
        </div>
    </div>



@endsection
