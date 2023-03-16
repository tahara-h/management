<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <meta name="description" content="ディスクリプションを入力">
    <!-- bootstrapを読み込むためのコード -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <header>
        <div class=system_title>Web日報登録</div>
        <!-- Authを使用してログインしたユーザーを表示「Models/User.phpの中を参照してある」 -->
        <div class=user_name>名前:{{Auth::user()->last_name}}{{Auth::user()->first_name}}</div>
        <form method="post" name="form1" action="{{route('logout')}}">
            @csrf
        <a class=logout href="javascript:form1.submit()" class=login>ログアウト<a>
        </form>
    </header>
    <main>
        <div class=left_menu>
            @yield("left_menu")
        </div>
        <div class=main-contents>
            @yield("contents")
        </div>
    </main>
</body>

</html>