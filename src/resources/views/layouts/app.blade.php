<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactForm</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <!-- ヘッダーロゴ -->
        <div class="header__inner">
            <div class="header__spacer">
                <!-- 中央寄せ用のダミーカラム -->
            </div>

            <h1 class="header__logo">
                <a class="header__link" href="/">FashionablyLate</a>
            </h1>

            <!-- ユーザー認証用ボタン -->
            <div class="header__auth">
                @yield('auth')
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>