@extends('layout')
@section('title', '勤怠管理システム(管理者画面)')
@section('left_menu')
    @include('manager_left_menu')
@endsection
@section('contents')
    <!-- 社員一覧用SCC -->
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0;
            margin-left: 10px;
            margin-top: 10px;
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

        .paginationWrap {
            display: flex;
            justify-content: center;
            margin-top: 38px;
            margin-bottom: 40px;
        }

        .paginationWrap ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        .paginationWrap ul.pagination li {
            display: inline;
            margin-right: 4px;
        }

        .paginationWrap ul.pagination li a {
            color: #2f3859;
            padding: 8px 14px;
            text-decoration: none;
        }

        .paginationWrap ul.pagination li a.active {
            background-color: #4b90f6;
            color: white;
            border-radius: 40px;
            width: 38px;
            height: 38px;
        }

        .paginationWrap ul.pagination li a:hover:not(.active) {
            background-color: #e1e7f0;
            border-radius: 40px;
        }
    </style>
    <h2>社員一覧画面</h2>
    <a href="{{ route('showRegisterUser') }}">新規登録</a>
    <table>
        <tr>
            <th>社員名</th>
            <th>入社日</th>
            <th>詳細</th>
            <th>編集</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>
                    {{ $user->first_name }}{{ $user->last_name }}
                </td>
                <td>
                    {{ $user->join_date }}
                </td>
                <td>
                    <a href="/user/{{ $user->id }}">詳細</a>
                </td>
                <td>
                    <a href="/user/edit/{{$user->id}}">編集</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div>
        {{-- 作成したページネーション --}}
        {{ $users->links('pagination::default') }}
        {{-- 元々あるページネーション（隙間がきになる) --}}
        {{-- {{ $users->links() }} --}}
    </div>
@endsection
