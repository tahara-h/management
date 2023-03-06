@extends("layout")
@section('title','勤怠管理システム(管理者画面)')
@section('left_menu')
@include('manager_left_menu')
@endsection
@section('contents')
<!-- 社員一覧用SCC -->
<style>
    table {
        border-collapse: separate;
        border-spacing: 0;
        margin-left: 5px;
        margin-top: 5px;
    }

    table th:first-child {
        border-radius: 5px 0 0 0;
    }

    table th:last-child {
        border-radius: 0 5px 0 0;
        border-right: 1px solid #3c6690;
    }

    table th {
        text-align: center;
        color: white;
        background: linear-gradient(#829ebc, #225588);
        border-left: 1px solid #3c6690;
        border-top: 1px solid #3c6690;
        border-bottom: 1px solid #3c6690;
        box-shadow: 0px 1px 1px rgba(255, 255, 255, 0.3) inset;
        width: 200px;
        padding: 10px 0;
    }

    table td {
        text-align: center;
        border-left: 1px solid #a8b7c5;
        border-bottom: 1px solid #a8b7c5;
        border-top: none;
        box-shadow: 0px -3px 5px 1px #eee inset;
        width: 25%;
        padding: 10px 0;
    }

    table td:last-child {
        border-right: 1px solid #a8b7c5;
    }

    table tr:last-child td:first-child {
        border-radius: 0 0 0 5px;
    }

    table tr:last-child td:last-child {
        border-radius: 0 0 5px 0;
    }
</style>
<div>
    <div>
        社員一覧画面
    </div>
    <a href=''>新規登録</a>
<table>
    <tr>
        <th>社員名</th>
        <th>入社日</th>
        <th>詳細</th>
        <th>編集</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>
            {{$user->first_name}}{{$user->last_name}}
        </td>
        <td>
            {{$user->join_date}}
        </td>
        <td>
            <a href="">詳細</a>
        </td>
        <td>
            <a href="">編集</a>
        </td>
    </tr>
    @endforeach
</table>
    {{ $users->links() }}
</div>
@endsection