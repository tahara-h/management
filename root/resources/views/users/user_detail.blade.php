@extends('layout')
@section('title', '社員詳細')
@section('left_menu')
    @include('manager_left_menu')
@endsection
@section('contents')
    <style>

    </style>
    <h2>社員詳細</h2>
    <a href="{{ route('showRegisterUser') }}">新規登録</a>
    <table>
        <tr><th>ふりがな</th><td>{{$user->last_name_kana}}{{$user->first_name_kana}}</td></tr>
        <tr><th>名前</th><td>{{$user->last_name}}{{$user->first_name}}</td></tr>
        <tr><th>住所</th><td>{{$user->prefecture}}{{$user->address1}}{{$user->address2}}</td></tr>
        <tr><th>メールアドレス</th><td>{{$user->email}}</td></tr>
        <tr><th>入社日</th><td>{{$user->join_date}}</td></tr>
        <tr><th>権限</th><td>「{{$user->role_id}}」※１の場合管理者、２の場合一般社員</td></tr>
    </table>
@endsection
