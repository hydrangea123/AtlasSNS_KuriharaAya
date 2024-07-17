<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    //検索機能
    public function search(Request $request){
        $keyword =$request->input('keyword');

        if(!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')->get();

        }else{
            $users = User::all();
        }

        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

   //プロフィール編集
   public function view(){
        $user = Auth::user();
       return view('users.profile', compact('user'));
   }

   public function update(Request $request){
    $validated = $request->validate([
        'username'                => 'required|string|min:2|max:12',
        'mail'                    => 'required|min:5|max:40|email|unique:users,mail,'.Auth::user()->mail.',mail',
        'password'                => 'required|alpha_num|min:8|max:20|confirmed',
        'password_confirmation'   => 'required|alpha_num|min:8|max:20',
        'bio'                     => 'max:150|nullable',
        'images'                  => 'mimes:jpg,png,bmp,gif,svg|nullable'
    ],  $errors = [
        'username.required'                => 'ユーザー名は必須です',
        'username.string'                  => '文字列で入力してください',
        'username.min'                     => '2文字以上で入力してください',
        'username.max'                     => '12文字以内で入力してください',

        'mail.required'                    => 'メールアドレスは必須です',
        'mail.min'                         => '5文字以上で入力してください',
        'mail.max'                         => '40文字以内で入力してください',
        'mail.email'                       => 'メール形式で入力してください',
        'mail.unique'                      => 'このメールアドレスはすでに登録されています',

        'password.alpha_num'               => '英数字で入力してください',
        'password.min'                     => '8文字以上で入力してください',
        'password.max'                     => '20文字以内で入力してください',
        'password.required'                => 'パスワードは必須です',

        'password_confirmation.required'   => 'パスワードは必須です',
        'password_confirmation.alpha_num'  => '英数字で入力してください',
        'password_confirmation.min'        => '8文字以上で入力してください',
        'password_confirmation.max'        => '20文字以内で入力してください',

        'bio.max'                          => '150文字以内で入力してください',

        'images.mines'                     => 'jpg,png,bmp,gif,svgの形式で選択してください'

    ]);

    $user = Auth::user();
    $user->username = $request->username;
    $user->mail = $request->mail;
    $user->password = bcrypt($request->password);
    $user->bio = $request->bio;

    //古いプロフィール画像を削除
    if($request->hasFile('images')){
           // Storage::dalete('public/images' . $user->images);
           //新しい画像を保存
        $fileName = time(). '.' . $request->images->extension();
        $request->images->storeAs('public/images', $fileName);
        //ユーザーのプロフィール画像を更新
        $user->images = $fileName;
    }

    $user->save();

    return redirect('/top');

   }

    //それぞれのプロフィール画面
    public function show($id){
        $users = User::find($id);
        $posts = Post::where('user_id',$id)->get();

        //dd($posts);
        //with('')でリレーションしたいテーブル名を記述すると、postとuserの全データの取り出し
        return view('users.each_profile', compact('users','posts'));
    }

 }
