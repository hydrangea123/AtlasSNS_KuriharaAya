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

    //プロフィールのバリデーション設定
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,png,bmp,gif,svg',
        ]);
    

    $user = Auth::user();

    //古いプロフィール画像を削除
    if($user->profile_picture) {
        Storage::delete('public/profile_pictures/' . $user->profile_picture);
    }

    //新しい画像を保存
    $fileName = time() . '.' . $request->profile_picture->extension();
    $request->profile_picture->storeAs('public/profile_pictures',$fileName);

    //ユーザーのプロフィール画像を更新
    $user->profile_picture = $fileName;
    $user->save();

    return back()->with('success','プロフィール画像が更新されました。');
    }

     //プロフィール編集
     public function profile(){
        $user = Auth::user();
       return view('users.profile', [ 'user' => $user ]);
   }

   public function update(Request $request)
   {
    $request->validate([
        'username'                => 'required|string|min:2|max:12',
        'mailadress'              => 'required|min:5|max:40|email|unique:users,mail',
        'newpassword'             => 'required|alpha_num|min:8|max:20|confirmed',
        'newpasswordconfirmation' => 'required|alpha_num|min:8|max:20',
        'bio'                     => 'min:150',
        'iconimage'               => 'mimes:jpg,png,bmp,gif,svg'
    ]);

    $user = Auth::user();
    $user->username = $request->username;
    $user->mailadress = $request->mailadress;
    $user->newpasswoed = bcrypt($request->newpassword);
    $user->newpasswoedconfirmation = bcrypt($request->newpasswordconfirmation);
    $user->bio = $request->bio;
    $user->iconimage = $request->iconimage;


    if($request->hasFile('images')){
        if($user->iconimage){
            Storage::dalete('public/images',$fileName);
        }

        $fileName = time(). '.' . $request->iconimage->extension();
        $request->iconimage->storeAs('public/images',$fileName);
        $user->iconimage = $fileName;
    }

    $user->save();

    return redirect()->route('profile.edit')->with('success','プロフィールが更新されました。');
   }
}
