<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
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
        return redirect()->route('user.logout');
    }

   //プロフィール編集
   public function view(){
        $user = Auth::user();
       return view('users.profile', compact('user'));
   }

   public function update(Request $request)
   {
    //$request->validate([
    //    'username'                => 'required|string|min:2|max:12',
    //    'mail'                    => 'required|min:5|max:40|email|unique:users,mail',
    //    'newpassword'             => 'required|alpha_num|min:8|max:20|confirmed',
    //    'newpasswordconfirmation' => 'required|alpha_num|min:8|max:20',
    //    'bio'                     => 'min:150|nullable',
    //    'images'                  => 'mimes:jpg,png,bmp,gif,svg|nullable'
    //],
    //[
    //    'username.required'                => 'ユーザー名は必須です。',
    //    'mail.required'                    => 'メールアドは必須です。',
    //    'newpassword.required'             => 'パスワード名は必須です。',
    //    'newpasswordconfirmation.required' => 'パスワードは必須です。',
    //    'bio.min'                          => '150文字以内で入力してください。',
    //    'images.mines'                     => 'jpg,png,bmp,gif,svgの形式で選択してください。'
    //    
    //]);

    $user = Auth::user();
    $user->username = $request->username;
    $user->mail = $request->mail;
    $user->password = bcrypt($request->password);
    $user->bio = $request->bio;

    //古いプロフィール画像を削除
    if($request->hasFile('images')){
        if($user->images){
            Storage::dalete('public/images' . $user->images);
        }

    //新しい画像を保存    
        $fileName = time(). '.' . $request->images->extension();
        $request->images->storeAs('public/images', $fileName);
    
    //ユーザーのプロフィール画像を更新
        $user->images = $fileName;
        $user->save();

        return redirect('/top');
    }
   }
}
