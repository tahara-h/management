@extends('layout')
@section('title', '勤怠管理システム(管理者画面)')
@section('left_menu')
    @include('manager_left_menu')
@endsection
@section('contents')
    <h2>休日申請</h2>
    {{-- 登録が完了したらのメッセージ(未完成) --}}
    @if (session('message_success'))
        <div class="alert alert-success">
            {{ session('message_success') }}
        </div>
    @endif
    <form method="POST" action="">
        @csrf
        <label for="prefecture" class="form-label">休暇種類</label>
        <select class="pref-name" name="prefecture">
            <option value="有給休暇" selected>有給休暇</option>
            <option value="無休休暇">無休休暇</option>
            <option value="看護休暇">看護休暇</option>
            <option value="介護休暇">介護休暇</option>
            <option value="育児休暇">育児休暇</option>
            <option value="その他休暇">その他休暇</option>
        </select>
        <label for='join_date'>休暇開始日</label>
        <input class="date-entry" name="join_date" type="date" />
        <label for='join_date'>休暇終了日</label>
        <input class="date-entry" name="join_date" type="date" />
        <div class='name-input-box'>
            <div class="form-group">
                <label for="last_name">
                    取得理由
                </label>
                <input name="last_name" id='last_name' class="form-control" type="text">
            </div>
            <button type="submit" class="btn btn-primary">
                投稿する
            </button>
        </div>
    </form>
@endsection
