<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //indexページの表示
    public function index(){
        $posts = Post::with('user')->latest()->get();
        //with('')でリレーションしたいテーブル名を記述すると、postとuserの全データの取り出し
        return view('posts.index',["posts" => $posts]); //blade内で使用するための記述
    }

    //投稿された内容を表示するページ
    public function create(Request $request){
        $validated = $request->validate([
        'post' => 'required|min:1|max:150'
        ], $errors = [
            'post.required' => '必須項目です',
            'post.min'      => '1文字以上で入力してください',
            'post.max'      => '150文字以下で入力してください'
        ]);

    //投稿内容を受け取って変数に入れる
    $id = Auth::id();
    $post = $request->input('post');

    Post::insert(["user_id" => $id, "post" => $post]);
    //postsテーブルにの投稿内容を入れる

        return redirect('/top');

}


    //編集処理
    public function edit(Request $request){

        $id = $request->input('modal_id');
        $up_post = $request->input('upPost');

        Post::where('id', $id)->update([
            'post' => $up_post,
        ]);

        return redirect('/top');
    }

    public function sampleShow(SampleFormRequest $request)
    {
        $validated = $request->validated();

        return redirect('/top');
    }



    //削除機能
     public function destroy($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }


}

