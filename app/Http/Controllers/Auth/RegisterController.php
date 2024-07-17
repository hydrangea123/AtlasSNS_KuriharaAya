<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //バリデーションルールを設定
    public function register(Request $request){
        if($request->isMethod('post')){
            $date = $request->all();
            $request->validate([
                'username'=>'required|min:2|max:40',
                'mail'=>'required|string|email|min:5|max:40',
                'password'=>'required|alpha_num|min:8|max:20|confirmed',
                'password_confirmation'=>'required|alpha_num|min:8|max:20'
            ],);

        //入力した値を取得する
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $request->session()->put('username',$username);

        //送信後「username」「mail」「password」のデータが格納される
        User::create([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
        ]);

        return redirect('added');
        }
    return view('auth.register');
    }

    public function added(){
         $users = User::get(); //Userモデル（usersテーブル）からレコード情報を取得
        return view('auth.added',['users'=>$users]);
    }
}
