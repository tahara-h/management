<?php

namespace App\Http\Controllers;
//データベース操作に必要なモデルを使う
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    //社員一覧画面を表示する
    public function showUsersList()
    {
        // ページネーションをするために15件だけ取得する
        $users = User::paginate(15);


        return view("users.users",["users"=> $users]);
    }
    // 社員登録画面を表示する
    public function showRegisterUser()
    {
        return view('users.user_register');
    }
    /**
    * 社員詳細画面を表示する
    *@param int $id
    */
    public function showUserDetail($id)
    {
        $user = User::find($id);
        if (is_null($user)){
            // データベースにデータが入ってなかった場合
            return redirect(route('showUsersList'));
        }
        return view('users.user_detail',['user'=> $user]);
    }
    // 社員を登録をする
    public function UserRegister(UsersRequest $request)
    {
        // パスワードをハッシュ化
        $password = bcrypt($request->password);
        // 文字列を数値に変換(権限の登録に必要)
        $number =(int) $request->role_id;
        DB::beginTransaction();
        try{
            // 社員入力フォームから受け取ったデータをデータベースに登録する
            User::create([
                'last_name' => $request->last_name,
                "first_name" => $request->first_name,
                "last_name_kana" => $request->last_name_kana,
                "first_name_kana" => $request->first_name_kana,
                "prefecture" => $request->prefecture,
                "address1" => $request->address1,
                "address2" => $request->address2,
                "email" => $request->email,
                "password" => $password,
                "join_date" => $request->join_date,
                'role_id' => $number
            ]);
            DB::commit();

        }
        // ユーザーをデータベースに登録する際何かしらのエラーが発生場合の対処
        catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        // 元のページを表示させ、完了のメッセージもSessionで送る
        //メッセージについては保留
        return view('users.user_register');
    }
        /**
    * 社員編集画面を表示する
    *@param int $id
    */
    public function showUserEdit($id)
    {
        $user = User::find($id);
        if (is_null($user)){
            // データベースにデータが入ってなかった場合
            return redirect(route('showUsersList'));
        }
        return view('users.user_edit',['user'=> $user]);
    }
    // 社員情報を更新する
    public function userUpdate(Request $request)
    {
        // パスワードをハッシュ化
        $password = bcrypt($request->password);
        // 文字列を数値に変換(権限の登録に必要)
        $number =(int) $request->role_id;
        DB::beginTransaction();
        try{
            // 送られたIDのデータだけ取得する。
            $user =User::find($request->id);
            $user->fill([
                'last_name' => $request->last_name,
                "first_name" => $request->first_name,
                "last_name_kana" => $request->last_name_kana,
                "first_name_kana" => $request->first_name_kana,
                "prefecture" => $request->prefecture,
                "address1" => $request->address1,
                "address2" => $request->address2,
                "email" => $request->email,
                "password" => $password,
                "join_date" => $request->join_date,
                'role_id' => $number
            ]);
        $user->save();
        DB::commit();
        }
        // ユーザーをデータベースに登録する際何かしらのエラーが発生場合の対処
        catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        // 元のページを表示させ、完了のメッセージもSessionで送る
        //メッセージについては保留
        return view('users.users');
    }
    //休暇申請画面を表示
    public function showHolidayRequest()
    {
        return view('holiday.holiday_request');
    }
    //申請一覧画面を表示
    public function showApplicationList()
    {
        return view('holiday.application_list');
    }

    // 勤怠一覧画面を表示する
    public function showWorksList()
    {
        $works = work::all();
        return view('works.works',['works' =>$works]);
    }
    // 勤務時間登録画面を表示する
    public function showRegisterWork()
    {
        return view('works.work_register');
    }
    //管理者と一般ユーザーの表示ベージを分ける。
    public function selectURL()
    {
        $UserSelect = Auth::user()->role_id;
        if($UserSelect === 1){
            return view("top.manager_top");
        }
        if($UserSelect === 2){
            return view('top.user_top');
        }
        $error = '参照が上手く行ってない';
        return dd($error);
    }
}