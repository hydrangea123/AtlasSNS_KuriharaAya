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

    
    //フォロー数、フォロワー数の表示
    //public function show(Follow $follow){
    //    $login_user = auth()->user();
    //    $is_following = $login_user->isFollowing($login_user->id);
    //    $is_followed = $login_user->isFollowed($login_user->id);
    //    $follow_count = $follow->getFollowCount($login_user->id);
    //    $follower_count = $follower->getFollowerCount($login_user->id);
//
    //    return view('/top',[
    //        'user'            => $user,
    //        'is_following'    => $is_following,
    //        'is_followed'     => $is_followed,
    //        'follow_count'    => $follow_count,
    //        'follower_count'  => $follower_count
    //    ]);
    //  }
    }

