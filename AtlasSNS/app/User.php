<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     //「１対多」の「多」側　→　メソッド名は複数形、相手側でhasManyを使う
    public function posts(){
        return $this->hasMany('App\Post');
    }
    //  「多対多」フォローしている側
    //belongsToMany('関係するモデルの場所',
    //'中間テーブルの名前(データベースを確認)',　'中間テーブルにある自分のIDが入るカラム', '中間テーブルの相手モデルに関係しているカラム')
    public function following(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }

    // 「多対多」フォローされている側
    public function followed(){
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }

     //フォローする
     public function follow(Int $user_id)
     {
         return $this->following()->attach($user_id);
     }
 
     //フォロー解除する
     public function unfollow(Int $user_id)
     {
         return $this->following()->detach($user_id);
     }
 
     //フォローしているか
     public function isFollowing(Int $user_id)
     {
         return (boolean) $this->following()->where('followed_id',$user_id)->first(['follows.id']);
     }
 
     //フォローされているか
     public function isFollowed(Int $user_id)
     {
         return (boolean) $this->following()->where('following_id',$user_id)->first(['id']);
     }

    }