@extends('layout')
@section('title', '勤怠管理システム(管理者画面)')
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

        .modalBackground {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.6);
            display: none;
        }

        .modalContent {
            position: absolute;
            top: 250px;
            left: 250px;
            width: 800px;
            background-color: #e1e7f0;
            padding: 20px;
            display: none;
        }
        /* モーダルウィンドウの業務内容入力欄 */
        .form-control {
            width: 500px;
        }
    </style>
    <h2>勤怠一覧</h2>
    <form action="{{ route('showWorksIndex') }}" method='get'>
        <select name='year'>
            <option value="2023" {{ $year == 2023 ? 'selected' : '' }}>2023</option>
            <option value="2024" {{ $year == 2024 ? 'selected' : '' }}>2024</option>
            <option value="2025" {{ $year == 2025 ? 'selected' : '' }}>2025</option>
            <option value="2026" {{ $year == 2026 ? 'selected' : '' }}>2026</option>
            <option value="2027" {{ $year == 2027 ? 'selected' : '' }}>2027</option>
            <option value="2028" {{ $year == 2028 ? 'selected' : '' }}>2028</option>
            <option value="2029" {{ $year == 2029 ? 'selected' : '' }}>2029</option>
            <option value="2030" {{ $year == 2030 ? 'selected' : '' }}>2030</option>
        </select>年
        <select name='month'>
            <option value="1" {{ $month == 1 ? 'selected' : '' }}>1</option>
            <option value="2" {{ $month == 2 ? 'selected' : '' }}>2</option>
            <option value="3" {{ $month == 3 ? 'selected' : '' }}>3</option>
            <option value="4" {{ $month == 4 ? 'selected' : '' }}>4</option>
            <option value="5" {{ $month == 5 ? 'selected' : '' }}>5</option>
            <option value="6" {{ $month == 6 ? 'selected' : '' }}>6</option>
            <option value="7" {{ $month == 7 ? 'selected' : '' }}>7</option>
            <option value="8" {{ $month == 8 ? 'selected' : '' }}>8</option>
            <option value="9" {{ $month == 9 ? 'selected' : '' }}>9</option>
            <option value="10" {{ $month == 10 ? 'selected' : '' }}>10</option>
            <option value="11" {{ $month == 11 ? 'selected' : '' }}>11</option>
            <option value="12" {{ $month == 12 ? 'selected' : '' }}>12</option>
        </select>月
        <button type='submit'>表示</button>
    </form>
    <div>
        <div class='modalOpen btn btn-outline-success'>打刻</div>
        <div class='modalBackground'></div>
        <div class="modalContent">
            <h2>日報登録</h2>
            <div>
                <?php
                $week = ['日', '月', '火', '水', '木', '金', '土'];
                $weekday = $week[date('w')];
                $today = date('Y年m月d日');
                echo "$today($weekday)";
                ?>
            </div>
            <div>
                <label for='startTime'>開始時間</label>
                <select id='startTime'>
                    <option selected>09:30</option>
                    <option>09:00</option>
                    <option>10:00</option>
                    <option>10:30</option>
                    <option>11:30</option>
                </select>
                <label for='endTime'>終了時間</label>
                <select id='endTime'>
                    <option selected>18:30</option>
                    <option>18:00</option>
                    <option>19:00</option>
                    <option>19:30</option>
                    <option>20:30</option>
                </select>
                <label for='restTime'>休憩時間</label>
                <select>
                    <option id='restTime' selected>1:00</option>
                    <option>00:30</option>
                    <option>01:30</option>
                    <option>02:00</option>
                    <option>02:30</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">業務内容</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
            </div>
            <a href='' class='modalClose btn btn-secondary btn-sm'>
                閉じる
            </a>
        </div>
        <a class='btn btn-outline-info' href="{{ route('showRegisterWork') }}">勤怠登録</a>
    </div>
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
                    {{ $work->date }}
                </td>
                <td>
                    曜日を出したい
                </td>
                <td>
                    {{ $work->work_start_time }}
                </td>
                <td>
                    {{ $work->work_end_time }}
                </td>
                <td>
                    {{ $work->break_time }}
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
