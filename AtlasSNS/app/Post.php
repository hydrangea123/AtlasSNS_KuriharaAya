<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['user_id','post'];

    //リレーション定義を追加
    //「１対多」の「多」側　→　メソッド名は複数形でhasManyを使う
    public function posts(){
        return $this->hasMany('App\User');
    }
}
