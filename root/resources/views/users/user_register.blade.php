@extends('layout')
@section('title', '勤怠管理システム(管理者画面)')
@section('left_menu')
    @include('manager_left_menu')
@endsection
@section('contents')
    <style>
        .user-register-form {
            display: flex;
            flex-direction: column;
            width: 800px;
            margin-left: 10px;
            margin-top: 10px;
        }

        .pref-name {
            width: 200px;
        }

        .date-entry {
            width: 200px;
        }

        .note {
            width: 600px;
            height: 100px;
        }

        .name-input-box {
            display: flex;
        }
    </style>
    <h2>社員登録</h2>
    {{-- 登録が完了したらのメッセージ(未完成) --}}
    @if(session('message_success'))
    <div class="alert alert-success">
          {{ session('message_success') }}
      </div>
    @endif
    <form method="POST" action="{{ route('userRegister') }}">
        @csrf
        <div class='name-input-box'>
            <div class="form-group">
                <label for="last_name">
                    性
                </label>
                <input name="last_name" id='last_name' class="form-control" type="text">
            </div>
            {{-- エラーメッセージを入れると上手く表示出来ない。
            UsersRepuest.phpが原因な気がする。とりあえず保留 --}}
            {{-- @if($errors->get('last_name'))
                <div class='text-danger'>
                    @foreach($errors->get('last_name') as $message)
                        {{$message}}
                    @endforeach
                </div>
            @endif --}}
            <div class="form-group">
                <label for="first_name">
                    名
                </label>
                <input name="first_name" id='first_name' class="form-control" type="text">
            </div>
        </div>
        <div class='name-input-box'>
            <div class="form-group">
                <label for="last_name_kana">
                    性(ふりがな)
                </label>
                <input name="last_name_kana" id='last_name_kana' class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="first_name_kana">
                    名(ふりがな)
                </label>
                <input name="first_name_kana" id='first_name_kana' class="form-control" type="text">
            </div>
        </div>
        <label for="prefecture" class="form-label">住所</label>
        <select class="pref-name" name="prefecture" id='prefecture'>
            <option value="" selected>都道府県</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
        </select>

        <div class="col-12">
            <label for='address1'>市区町村・番地</label>
            <input type="text" class="form-control" name="address1" id='address1' placeholder='例)豊島区池袋3-22-14' required>
        </div>
        <div class="col-12">
            <label for='address2'>建物名・部屋番号</label>
            <input type="text" class="form-control" name="address2" id='address2' placeholder="例)国土西池ビル5F">
        </div>
        <div class="col-12">
            <label for='email'>メールアドレス </label>
            <input type="email" class="form-control" id='email' name="email" placeholder="you@example.com">
        </div>
        <div class="col-12">
            <label for='password'>パスワード </label>
            <input type="password" class="form-control" id='password' name="password" placeholder="">
        </div>
        <div class="col-12">
            <label for='join_date'>入社日</label>
            <input class="date-entry" id='join_date' name="join_date" type="date" />
        </div>
        <div class="col-12">
            <label for='role_id'>権限の設定</label>
            <select class="date-entry" id='role_id' name="role_id">
                <option value="2">一般社員</option>
                <option value="1">管理者</option>
            </select>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">
                投稿する
            </button>
        </div>
    </form>
@endsection
