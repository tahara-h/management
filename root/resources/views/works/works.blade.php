@extends("layout")
@section('title','勤怠管理システム(管理者画面)')
@section('left_menu')
    @include('manager_left_menu')
@endsection
@section('contents')
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
            padding: 10px 0;
        }

        table td {
            text-align: center;
            border-left: 1px solid #a8b7c5;
            border-bottom: 1px solid #a8b7c5;
            border-top: none;
            box-shadow: 0px -3px 5px 1px #eee inset;
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
    <h2>勤怠一覧</h2>
    <a href="{{route('showRegisterWork')}}">勤怠登録</a>
    <table>
        <tr>
            <th rowspan='2'>日</th>
            <th rowspan='2'>曜日</th>
            <th rowspan='2'>始業時刻</th>
            <th rowspan='2'>終業時刻</th>
            <th rowspan='2'>調整時間</th>
            <th rowspan='2'>勤務時間</th>
            <th colspan='3'>臨時交通費</th>
            <th colspan='3'>通勤交通費</th>
            <th rowspan='2'>承認印</th>
        </tr>
        <tr>
            <th>科目</th>
            <th>区間</th>
            <th>金額</th>
            <th>科目</th>
            <th>区間</th>
            <th>金額</th>
        </tr>
        @foreach ($works as $work)
            <tr>
                <td>
                    {{ $work->date}}
                </td>
                <td>
                    曜日を出したい
                </td>
                <td>
                    {{$work->work_start_time}}
                </td>
                <td>
                    {{$work->work_end_time}}
                </td>
                <td>
                    {{$work->break_time}}
                </td>
                <td>
                    勤務時間を出したい
                </td>
                <td>
                    保留
                </td>
                <td>
                    保留
                </td>
                <td>
                    保留
                </td>
                <td>
                    保留
                </td>
                <td>
                    保留
                </td>
                <td>
                    保留
                </td>
                <td>
                <td>
            </tr>
        @endforeach
    </table>
    <div>
        {{-- 作成したページネーション --}}
        {{-- {{ $users->links('pagination::default') }} --}}
        {{-- 元々あるページネーション（隙間がきになる) --}}
        {{-- {{ $users->links() }} --}}
    </div>
@endsection