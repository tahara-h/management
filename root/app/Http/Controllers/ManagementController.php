<?php

namespace App\Http\Controllers;
//データベース操作に必要なモデルを使う
use App\Models\User;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    //社員一覧を表示するメソッド
    public function showUsersList()
    {
        // モデルでしていたusersテーブルの中身をとってくる
        // paginateで取ってくる数を指定。allを入れたら全て
        $blogs = User::paginate(15);


        return view("users.users",["users"=> $blogs]);
    }
}
