<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //indexページの表示
    public function index(){
        $posts = Post::with('user')->get();
        //with('')でリレーションしたいテーブル名を記述すると、postとuserの全データの取り出し
        return view('posts.index',["posts" => $posts]); //blade内で使用するための記述
}

    //投稿された内容を表示するページ
    public function create(Request $request){

   //バリデーション
    $request->validate([
        'post' => 'required|min:1|max:150'
    ]);

    //投稿内容を受け取って変数に入れる
    $id = Auth::id();
    $post = $request->input('post');

    Post::insert(["user_id" => $id, "post" => $post]);
    //postsテーブルにの投稿内容を入れる

    $post = Post::all(); //全データの取り出し
    return view('posts.index',["post" => $post]); //postにデータを渡す

}

    //編集処理
    public function edit(Request $request, $id){
        $post = Post::find($id);
        $edit = $this->post->edit($request, $post);
        return redirect()->route('top');
    }

    //削除機能
     public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('top');
    }

}
