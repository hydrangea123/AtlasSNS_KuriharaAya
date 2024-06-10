<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->


</head>
<body>
    <header>
        <div class="header-left">
            <h1><a href="/top"><img src="/images/atlas.png" width=110px></a></h1>
        </div>

        <div class="header-right">
            <div><p style="color:#fff; font-size :1.2em; margin-right: 35px;">{{ Auth::user()->username }}&nbsp;さん</p></div>
                <div class="accordion">
                    <button type="button" class="menu-btn"></button>
                   <nav class="menu">
                       <ul>
                           <li><a href="/top">HOME</a></li>
                           <li><a href="/profile">プロフィール編集</a></li>
                           <li><a href="/logout">ログアウト</a></li>
                       </ul>
                   </nav>
                </div>

            <div><img src="{{ Auth::user()->images }}" class="icon" width="55px"></div>
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="side-flex">
                    <p>フォロー数</p>
                    <p>{{ Auth::user()->following->count() }}人</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>

                <div class="side-flex followCount">
                    <p class="followCount_text">フォロワー数</p>
                    <p>{{ Auth::user()->followed->count() }}人</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn search-btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>


    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>
