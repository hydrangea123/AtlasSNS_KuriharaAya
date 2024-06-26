<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow; //Followモデルをインポート
use Illuminate\Support\Facades\Auth; //Authファサードを読み込む
use App\User;
use App\Post;
class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }


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

    }

