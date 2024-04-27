<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //モデルに関連付けるテーブル
    protected $table = 'posts';

    //テーブルに関連付ける主キー
    protected $primaryKey = 'user_id';

    //登録・更新可能なカラムの指定
    protected $fillable =['user_id','post'];

    //リレーション定義を追加
   //「１対多」の「１」側　→　メソッド名は単数形、相手側の名前でbelongsToを使う
    public function user(){
        return $this->belongsTo('App\User');
    }

    //一覧画面表示用にpostsテーブルからすべてのデータを取得
    public function findUsers(){
        return User::all();
    }

    //更新処理 fillト->save()の組み合わせで更新処理ができる
    public function updateUser($request, $post){
        $result = $user->fill([
            'post' => $request->post
        ])->save();

        return $result;
    }
}
