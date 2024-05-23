<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    //'中間テーブルの名前',　'中間テーブル外部キー名', '中間テーブル外部キー名')
    public function following(){
        return $this->belongsToMany('users','follow','following_id','followed_id');
    }

    // 「多対多」フォローされている側
    public function followed(){
        return $this->belondsToMany('users','follow','followed_id','following_id');
    }
}
