@extends("layout")
@section('title','勤怠管理システム(管理者画面)')
@section('left_menu')
    @include('manager_left_menu')
@endsection
@section('contents')
    データベースから社員名、入社日、詳細、編集を表示させる。
@endsection