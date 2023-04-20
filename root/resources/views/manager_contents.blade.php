<div class=content_list>
    <div class=content_box>
        <div class=content_name>申請管理</div>
        <div class=content_box_small>
            <a href="{{route('showApplicationList')}}" type="button" class="btn btn-primary w-h radies">申請一覧</a>
        </div>
        <div class=content_box_small>
            <a href="{{route('showHolidayRequest')}}" type="button" class="btn btn-primary w-h">休日設定</a>
        </div>
    </div>
    <div class=content_box>
        <div class=content_name>社員管理</div>
        <div class=content_box_small>
            <a href="{{route('showUsersList')}}" type="button" class="btn btn-primary w-h radies">社員一覧</a>
        </div>
        <div class=content_box_small>
            <a href="{{route('showRegisterUser')}}" type="button" class="btn btn-primary w-h">社員登録</a>
        </div>
    </div>
    <div class=content_box>
        <div class=content_name>休日設定</div>
        <div class=content_box_small>
            <a href="{{route('showApplicationList')}}" type="button" class="btn btn-primary w-h radies">休日一覧</a>
        </div>
        <div class=content_box_small>
            <a href="{{route('showHolidayRequest')}}" type="button" class="btn btn-primary w-h">休日登録</a>
        </div>
    </div>
    <div class=content_box>
        <div class=content_name>勤怠管理</div>
        <div class=content_box_small>
            <a href="/works" class="btn btn-primary w-h radies">勤怠一覧</a>
        </div>
        <div class=content_box_small>
            <a href="{{route('showRegisterWork')}}" type="button" class="btn btn-primary w-h">勤怠登録</a>
        </div>
    </div>
    {{-- <div class=content_box>
        <div class=content_name>各種申請</div>
        <div class=content_box_small>
            <a href="{{route('')}}" type="button" class="btn btn-primary w-h">休日申請</a>
        </div>
        <div class=content_box_small>
            <a href="{{route('')}}" type="button" class="btn btn-primary w-h">交通費申請</a>
        </div>
        <div class=content_box_small>
            <a href="{{route('')}}" type="button" class="btn btn-primary w-h">備品申請</a>
        </div>
    </div> --}}
</div>