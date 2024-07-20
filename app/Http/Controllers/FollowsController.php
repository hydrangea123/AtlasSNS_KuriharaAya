<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow; //Followモデルをインポート
use Illuminate\Support\Facades\Auth; //Authファサードを読み込む
use App\User;
use App\Post;
class FollowsController extends Controller
{

    //フォロー
    public function follow(User $user){
        $follower = auth()->user();

        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following){
            //フォローしていなければフォローする
            $follower->follow($user->id);
            return back();

        }
    }

    //フォロー解除
    public function unfollow(User $user){
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following){
            //フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }


    //フォロー画面
    //ログインーザーがフォローしているユーザーの投稿の表示
    public function follow_list(){
        $followedUsers = Auth::user()->following()->pluck('followed_id');
        $posts = Post::whereIn('user_id',$followedUsers)->orderBy('created_at', 'desc')->get();

        return view('follows.followList', compact('posts'));
    }



    //フォロワー場面
    //ユーザーがフォローされているユーザーの投稿の表示
    public function follower_list(){
        $followingUsers = Auth::user()->followed()->pluck('following_id');
        $posts = Post::whereIn('user_id',$followingUsers)->orderBy('created_at', 'desc')->get();

        return view('follows.followerList', compact('posts'));
    }



}
