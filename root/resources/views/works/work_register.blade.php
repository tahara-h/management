@extends("layout")
@section('title','勤怠管理システム(管理者画面)')
@section('left_menu')
    @include('manager_left_menu')
@endsection
@section('contents')
<h2>勤怠登録</h2>
<form method="POST" action="{{ route('registerWork') }}">
    @csrf
    <div class='name-input-box'>
        {{-- <div class="form-group">
            <label for="title">
                勤務開始時間
            </label>
            <input name="work_start_time" class="form-control" type="int">
        </div> --}}
        <div class="form-group">
            <label for="title">
                勤務終了時間
            </label>
            <input name="text" id="inputtext" class="form-control" type="text">
        </div>
    </div>

    <div class="mt-5">
        <button type="submit" class="btn btn-primary">
            投稿する
        </button>
    </div>
</form>
@endsection