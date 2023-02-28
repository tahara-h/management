<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class AuthController extends Controller
{
    //ログイン画面を表示する
    public function showLogin()
    {
        return view("login.login_form");
    }
    //ログイン判定
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');
        //入力した値が$credentialsにどんな形で入っているか確認
        // dd($credentials);
        // $credentials['password']=password_hash('root',PASSWORD_DEFAULT);
        // dd($credentials);
        //ログインフォームから入力された情報が正しいが判断
        if (Auth::attempt($credentials)){
            //正しい場合はユーザー情報をセッションに保存（サーバー）
            $request->session()->regenerate();
            return redirect("/");
            // ->with()を使うと上手く表示できないので後で調べる
            // return redirect("/")->with('login_success', "ログインが成功しました！");
            //ルートに名前をつけたらこれでもOK
            //return route("home"):
        }
        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }

}
