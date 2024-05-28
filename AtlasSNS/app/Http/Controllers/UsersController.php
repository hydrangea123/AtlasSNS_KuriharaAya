<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UsersController extends Controller
{
    //
    public function profile(){
         $user = Auth::user();
        return view('users.profile', [ 'user' => $user ]);
    }


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
}
